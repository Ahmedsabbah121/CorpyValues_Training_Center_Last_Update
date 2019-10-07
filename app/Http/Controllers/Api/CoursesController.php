<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Validator;
use Illuminate\Database\Eloquent\Builder;
class CoursesController extends Controller
{
    /*----------------------------------START OF HOME REQUEST ------------------------------------*/ 
    public function home(){
        $error = [
            'message' => 'Request error'
        ];
        $success = [
            'message' => 'success request'
        ];
        $sliders = DB::table('sliders')->select('slider_id','slider_image')->get();
        if($sliders){
            $final_sliders = [];
            for($i = 0; $i < count($sliders);$i++){
                $slider_image = "public/frontend/images/upload/slider/".$sliders[$i]->slider_image;
                $sliders_object =(object) [
                    'slider_id' =>$sliders[$i]->slider_id,
                    'slider_image' =>$slider_image,
                ];
                array_push($final_sliders , $sliders_object);
            }
        }else{
            result(false , $error , null);
        }
        //first section in home page
        $major_info = DB :: table ('majors')->select('major_id','major_name','major_desc')->get();
        if($major_info){
            $final = array();
            foreach($major_info as $major){
                $major_courses = DB::table('courses')->select('users.name as center_name','courses.course_name as course_name',
                'courses.course_price','courses.course_hours','courses.course_image','courses.publication_status','courses.course_content',
                'courses.course_level')
                ->join('users','users.id' ,'=', 'courses.user_id')
                ->where('courses.major_id' ,'=', $major->major_id)->take(3)->get();
                for($i = 0; $i < count($major_courses);$i++){
                        $course_image = "public/courses_images/".$major_courses[$i]->course_image;
                        $major_courses[$i] ->course_image =$course_image;
                }
                $major->courses = $major_courses;
                array_push($final,$major);
            }
            $object = (object) [
                'sliders' => $final_sliders,
                'majors' =>  $final];
            result(true , $success , $object);
        }else{
            result(false , $error , null);
        }
       
    }
/*----------------------------------END OF HOME REQUEST ------------------------------------*/ 
/*----------------------------------START OF COURSES REQUEST ------------------------------------*/ 
public function courses(Request $request){
    $success = (object) ["message" => "success"];
    $error = (object) ["message" => "error"];
    $rules = ['major_id' => 'required|numeric'];
    $validator = Validator::make(request()->all(),$rules);
    if($validator->fails()){
        result( false, $validator->messages(), null);
    }
    else{
        $courses = DB::table('courses')->select('courses.course_id','courses.user_id','courses.course_name','courses.course_content',
        'courses.course_level','courses.course_price','courses.course_hours','courses.course_image as course_image','courses.created_at','courses.updated_at',
        'users.name as center_name')
        ->join('users','users.id','=','courses.user_id')
        ->where('courses.major_id','=',$request->major_id )->get();
        foreach($courses as $course){
            $course_image = "public/courses_images/".$course->course_image;
            $course->course_image =$course_image;
        }
        if($courses){
            $coursesObject = [
                "courses"=>$courses
            ];
            result(true , $success , $coursesObject);
        }else{
            result(true , $error , null);
        }
        
    }
}
    /*----------------------------------END OF COURSES REQUEST ------------------------------------*/ 
    public function course_details(Request $request){
        $success = (object) ["message" => "success"];
        $error = (object) ["message" => "error"];
        $rules = ['course_id' => 'required|numeric'];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails()){
            result( false, $validator->messages(), null);
        }
        else{
            $course_details = DB::table('courses')->select('courses.course_id','courses.course_name','courses.course_content',
                                                    'courses.course_level','courses.course_price','courses.course_hours','courses.course_image as course_image','courses.created_at','courses.updated_at',
                                                    'users.name as center_name')
                                                    ->join('users','users.id','=','courses.user_id')
                                                    ->where('courses.course_id','=',$request->course_id )->get();
                                                    // dd($courses);
                                                    if($course_details){
                                                        foreach($course_details as $course){
                                                            $course_image = "public/courses_images/".$course->course_image;
                                                            $course->course_image =$course_image;
                                                        }
                                                        $coursesObject = [
                                                            "course_details"=>$course_details
                                                        ];
                                                        result(true , $success , $coursesObject);
                                                    }
                                                    else{
                                                        result(true , $error , null);
                                                    }     
        }
    }
    public function Add_Course(Request $request){
        $success = (object) ["message" => "success"];
        $error = (object) ["message" => "server error"];
        $error1 = (object) ["message" => "user doesn't exist or not logged in "];
        $rules = [
                'user_id' =>'required|integer',
                'api_token' =>'required',
                'course_image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'course_name' =>'required|min:3|max:191',
                'course_level' =>'required|string',
                'course_price' =>'required|numeric',
                'course_hours' =>'required|integer',
                'major_id' =>'required|integer',
                ];
        $validator = Validator::make(request()->all(),$rules);
        if($validator->fails())
        {
            result( false, $validator->messages(), null);
        }else{
            $user_is_exist = DB::table('users')
            ->where('id',$request->user_id)
            ->where('api_token',$request->api_token)
            ->first();
            if(!empty($user_is_exist)){
                $data = array();
                $image = $request->file('course_image');
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'courses_images';
                $image_url = $image_full_name;
                $uploaded=$image->move($upload_path,$image_full_name);
                if($uploaded){
                    $data['course_image'] = $image_url;
                }
                else{
                    $data['course_image'] = '';
                }
                $insert = DB::table('courses')->insertGetId([
                    'major_id' =>$request->major_id,
                    'user_id' => $request->user_id,
                    'course_name' => $request->course_name,
                    'course_content' => $request->course_content,
                    'course_level' => $request->course_level,
                    'course_price' => $request->course_price,
                    'course_hours' => $request->course_hours,
                    'course_image' => $data['course_image'],
                    'publication_status' => 0,
                    'created_at' =>  new \DateTime()
                ]);
                if($insert){
                    $data = ['Course id'=>$insert];
                    result( true, $success, $data);
                }
                else{
                    result( false, $error, null);
                }
            }
            else{
                result( false, $error1, null);
            }
            
        }
    } 
}


