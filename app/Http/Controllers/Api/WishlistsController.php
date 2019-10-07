<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Validator;
use Illuminate\Database\Eloquent\Builder;
class WishlistsController extends Controller
{
    public function wishlist(Request $request){
        $error = [
            'message' => 'Request error'
        ];
        $success = [
            'message' => 'success request'
        ];
        $rules = [
            "user_id" => "required|numeric",
            "api_token" => "required"
        ];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails()){
            result(false , $validator->messages() , null);
        }
        else{
            //select all wishlist 
            $wishlist = DB::table('wishlists')->select('wishlists.wish_id as wishlist_id','wishlists.customer_id as user_id','wishlists.course_id as wishlist_course_id','wishlists.created_at as added_to_wishlist_at','courses.major_id as major_id'
             ,'courses.course_name as course_name','courses.course_image as course_image')
        
            ->join('courses','courses.course_id' , 'wishlists.course_id')
            ->join('users','users.id' , 'wishlists.customer_id')->where( 'users.api_token' , $request->api_token )
            ->where('wishlists.customer_id' , $request->user_id )->get();
           
            foreach($wishlist as $wish){
                $course_image = "public/courses_images/".$wish->course_image;
                $wish->course_image =$course_image;
            }
                $arr =(object)[
                    "wishlist" => $wishlist
                ];
                result(true , $success , $arr );
        }
    }
    function getErrorMsg($msg){
        return [
            'message' => $msg
        ];
    }
    public function add_to_wishlist(Request $request){
        // inputs ('user_id','course_id', 'api_token')
        $errorMsg = 'Internal Server Error';
        $error = [
            'message' => $errorMsg
        ];
        $success = [
            'message' => 'success request'
        ];
        $rules = [
            'user_id'=>'required',
            'course_id'=>'required',
            'api_token'=>'required'
        ];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails()){
            result(false , $error , null);
        }else{
            $user = DB::table('users')->where('id',$request->user_id)->first();
            if($user){
                if($user->api_token == $request->api_token){
                $wishItem = DB::table('wishlists')
                ->where('course_id','=',$request->course_id)
                ->where('customer_id',$request->user_id)
                ->first();
                
                if($wishItem){
                  $errorMsg = 'Item already exists!';
                  result(true , getErrorMsg($errorMsg) , null);
                }
                else{
                  $wish_id = DB::table('wishlists')->insert([
                      'customer_id' => $request->user_id,
                      'course_id' => $request->course_id
                  ]);
                  if(!empty($wish_id)){
                      result(true , $success ,null);
                  }
                  else{
                      result(true , $error , null);
                  }
                }
              }
              else{
                result(true , $error , null);
            }
            }
            else{
                result(true , $error , null);
            }
        }
    }
    public function remove_from_wishlist(Request $request){
        $error = [
            'message' => 'Internal Server Error'
        ];
        $success = [
            'message' => 'success request'
        ];
        $rules = [
            'user_id'=>'required|numeric',
            'course_id'=>'required|numeric',
            'api_token'=>'required'
        ];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails()){
            result(false , $validator->messages() , null);
        }else{
            $user = DB::table('users')
                    ->select('users.api_token as api_token','users.id as id')
                    ->where('users.id',$request->user_id)
                    ->first(); 
                   // dd($user);
                    if($user){
                        if($user->api_token == $request->api_token){
                            $delete = DB::table('wishlists')
                            ->where('customer_id',$user->id)
                            ->where('course_id',$request->course_id)->delete();
                            if($delete){
                               $remover = ['message'=>'Item removed succesfully'];
                                result(true , $success , $remover);
                            }
                            else{
                                result(true , $error , null);
                            }
                        }else{
                            result(true , $error , null);
                        }
                    }else{
                        result(true , $error , null);
                    }
        }
    }
}