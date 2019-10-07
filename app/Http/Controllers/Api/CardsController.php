<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
class CardsController extends Controller
{
    public function view_cart(Request $request){
        $success = [
            'message'=>'successfull request'
        ];
        $error = [
            'message' =>'request error'
        ];
        $rules =[
            'user_id' =>'required|numeric',
            'api_token' =>'required'
        ];
        $validator = Validator::make(request()->all() , $rules);
        if($validator->fails()){
            result(false,$validator->messages(),null);
        }
        else{
            $user = DB::table('users')->select('id')
            ->where('id',$request->user_id)
            ->where('api_token',$request->api_token)->first();
            // dd($user);
            if($user){
                $card = DB::table('cards')
                ->where('customer_id',$user->id)->get();
                // dd($card);
                
                if($card){
                    $cards = [
                        "cards" =>$card
                    ];
                    result(true , $success , $cards );
                }
                else{
                    result(false,$error,null);
                }
            }
            else{
                result(false,$error,null);
            }
        }
    }
    public function add_to_cart(Request $request){
        $success = [
            'message'=>'successfull request'
        ];
        $error = [
            'message' =>'request error'
        ];
        $rules =[
            'user_id' =>'required|numeric',
            'course_id' =>'required|numeric|unique:cards',
            'api_token' =>'required'
        ];
        $validator = Validator::make(request()->all() , $rules);
        if($validator->fails()){
            result(false,$validator->messages(),null);
        }
        else{
            $api_token = DB::table('users')->select('api_token')->where('id',$request->user_id)->first();
                if($api_token = $request->api_token){
                    $course_exists = DB::table('courses')->select('course_id')->where('course_id',$request->course_id)->first();
                    if($course_exists){
                        $insert = DB:: table('cards')->insertGetId([
                            'customer_id' => $request->user_id,
                            'course_id' => $request->course_id,
                            'created_at' => new \DateTime()
                        ]);
                        if($insert){
                            $insert = ['card_id'=>$insert];
                            result(true,$success,$insert);
                        }else{
                            result(false,$error,null);
                        }
                }
                else{ result(false,'course doesnot exist',null);}
            }
            else{result(false,'user must login',null);}
        }
    }
    public function remove_from_cart(Request $request){
        $success = [
            'message'=>'successfull request'
        ];
        $error = [
            'message' =>'request error'
        ];
        $rules =[
            'user_id' =>'required|numeric',
            'card_id' =>'required|numeric',
            'api_token' =>'required'
        ];
        $validator = Validator::make(request()->all() , $rules);
        if($validator->fails()){
            result(false,$validator->messages(),null);
        }
        else{
            $api_token = DB::table('users')->where('id',$request->user_id)->first();
            // dd($api_token);
            if($api_token->api_token == $request->api_token){
                $destroy =  DB::table('cards')
                ->where('id',$request->card_id)
                ->where('customer_id',$request->user_id)
                ->delete();
                if($destroy){
                    result(true,'cart deleted successfully',null);
                }else{
                    result(false,$error,null);
                }
            }
            else{
                result(false,'user must login first',null);
            }
        }

    }


}


