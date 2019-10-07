<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
//use App\Http\Resources\AuthResource;
use DB;
use Validator;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Builder;
class AuthController extends Controller
{
    /*---------------------------------start of login request--------------------------------------*/
    public function login(Request $request){
        $error = [
            'messages' => 'Request error'
        ];
        $success = [
            'messages' => 'success request'
        ];
        $rules = [
            'email' => 'required|email',
            'password'=> 'required'
        ];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails()){
            result( false, $validator->messages(), null);
        }
        else{
                if(auth()->attempt(['email'=>request('email') , 'password'=>request('password')])){
                 DB::table('users')->where('email',request('email'))->update(['api_token'=>Str::random(60)]);
                 $user = DB::table('users')->where('email',$request->email)->first();
                 $image_path ="public/user_images/".$user->image;
                 $userdata = [
                      "user" => ['name' =>$user->name,
                                'email' =>$user->email ,
                                'api_token' =>$user->api_token,
                                'phone' => $user->phone,
                                'city' => $user->city,
                                'address' => $user->address,
                                'type' => $user->type,
                                'image' => $image_path,
                                'official documents' =>$user->official_docs
                                ]
                ];
                    result(true , $success ,$userdata);
                }
                else{
                    result(false, $error , null);
                }
            }
    }
    /*---------------------------------end of login request--------------------------------------*/

   /*---------------------------------start of register request--------------------------------------*/
    public function register(Request $request)
    { 
        $error = [
            'message' => 'Request error'
        ];
        $success = [
            'message' => 'success request'
        ];
        $rules = [
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:6',
            'phone' => 'required|min:11|max:11',
            'city' => 'required',
            'address' => 'required',
            'type' => 'required',
            'image' =>'required'
        ];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails()){
            result( false, $validator->messages(), null);
        }
        else{
            $image_name = Str::random(15).time().'.'. $request->image->getClientOriginalName();
            $request->image->move(public_path('user_images'), $image_name);

            if(!empty($request->center_document)){
                $center_docs = Str::random(15).time().'.'. $request->center_document->getClientOriginalName();
                $request->center_document->move(public_path('centers_docs'), $center_docs);
            }
            else{
                $center_docs=null;
            }
            $password = Hash::make($request->password);
            $id = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'phone' => $request->phone,
                'city' => $request->city,
                'address' => $request->address,
                'type' => $request->type,
                'official_docs' => $center_docs,
                'image' => $image_name,
                'api_token'=>Str::random(60),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
                ]);
                if(!empty($id)){
                    $user = DB::table('users')->where('id' , $id)->first();
                    if(empty($user->official_docs)){
                        $official_docs = null;
                    }
                    else{$official_docs = $user->official_docs;}
                        $user_data = [
                            "user" => [ 'id' =>$id,
                                        'name' =>$user->name,
                                        'email' =>$user->email ,
                                        'phone' => $user->phone,
                                        'city' => $user->city,
                                        'address' => $user->address,
                                        'type' => $user->type,
                                        'official documents' =>$official_docs,
                                        'image' => "public/user_images/".$user->image
                            ]
                        ];
                        result(true , $success ,$user_data);
                }
                else{
                    result(true , $error ,$user_data);
                }
        }
    }
    /*---------------------------------end of register request--------------------------------------*/
    /*---------------------------------start of profile request--------------------------------------*/
public function logout(Request $request){
    $rules = [
        "user_id" =>'required',
        "api_token" => 'required'
    ];
    $validator = Validator::make(request()->all() , $rules);
    if($validator->fails()){
        result(false , $validator->messages(),null);
    }
    else{
        if(DB::table('users')->update(['api_token'=>null]))
        {
            result(true , "success",null);
        }
        else{
            result(false, '$error ', null);
        }
    }

}
    public function profile(Request $request){
        $error = [
            'message' => 'Request error'
        ];
        $success = [
            'message' => 'success request'
        ];
        $rules = [
            'user_id' =>'required',
            'api_token' =>'required'
        ];
        $validator = Validator::make(request()->all() , $rules);
        if($validator->fails()){
            
            result(false , $validator->messages(),null);
        }
        else{

            $user = DB::table('users')->where('id',$request->user_id)->first();
            if($user){
            if($user->api_token == $request->api_token){
                if($user->type == 'academy'){
                    //academic section
                    $courses = DB::table('courses')->select('*')
                    ->join('majors','majors.major_id','=','courses.major_id')
                    ->where('user_id', $user->id)->get();
                    foreach($courses as $course){
                        $course_image = "public/courses_images/".$course->course_image;
                        $course->course_image =$course_image;
                        $course->center_name = $user->name;
                    }
                    $coursesObject = [
                        "courses"=>$courses
                    ];
                    result(true , $success , $coursesObject);
                }
                elseif($user->type == "trainee"){
                    //trainee section return trainee details , courses reserved 
                    $orders = DB::table('orders')
                    ->select('*')
                    ->join('payments','payments.payment_id','orders.payment_id')
                    ->where('user_id',$user->id)
                    ->get();
                    $data = [
                        "orders"=>$orders
                    ];
                    result(true, $success, $data);
                }
            }else{
                result(false, $error, null);
            }
        }
        else{
            result(false, $error, null);
        }
            
        }
    }
}
