<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Major;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use validator;
use Session;
session_start();

class CourseController extends Controller
{
	public function index_course()
	{
		return view('admin.add_course'); 
	}
	
	// public function getCourses(Request $request){
	// 	if($request->ajax()){
	// 		$home_courses = DB::table('courses')
    //                         ->join('majors','courses.major_id' ,'=' ,'majors.major_id')
    //                         ->join('users','courses.user_id','=','users.id' )
    //                         ->select('courses.*' , 'majors.major_name' , 'users.name')
    //                         ->where(['majors.publication_status'=> 1 , 'users.publication_status'=> 1])
	// 						->paginate(3);
	// 		// dd($home_courses);
	// 		return view('pages.home_content',compact('home_courses'))->render();	
	// 	}
	// }
	public function save_course(Request $request)
	{
		$data = array();
		$image = $request->file('course_image');
		if($image){
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'backend/courses';
			$image_url = $image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			if($success){
				$data['course_image'] = $image_url;
			}
		}

		$course = Course::firstOrCreate([  //protection against duplicate entry
        'major_id' => $request->major_id,
        'user_id' => $request->user_id,
        'course_name' => $request->course_name,
        'course_content' =>$request->course_content,
        'course_level' => $request->course_level,
        'course_price' =>  $request->course_price,
        'course_hours' => 	$request->course_hours,
        'course_image' => $data['course_image'],
        'publication_status' =>  $request->publication_status 
   		]);
		if($course)
		{
			Session::put('message' , 'Course Registration Successfully');
			return Redirect::to('/view_courses');
		}
		else
		{
			Session::put('message' , 'Course Registration Inccorect');
			return Redirect::to('/add_course');
		}
	} //end function
	public function view_courses(Request $request)
	{
	
		$all_courses_info = DB::table('courses')
    						->join('majors','courses.major_id' ,'=' ,'majors.major_id')
    						->join('users','courses.user_id','=','users.id' )
    						->select('courses.*' , 'majors.major_name' , 'users.name')
    						->where(['majors.publication_status'=> 1 , 'users.publication_status'=> 1])
    						->get();

		return view('admin.view_courses')->with('all_courses_info' , $all_courses_info);
	}
	public function unactive_course ($id)
	{
		// echo $id;
		DB::table('courses')
    			->where('course_id' , $id)
    	        ->update(['publication_status'=> 0]);
    	Session::put('message' , 'Course UnActive Successfully !');
    	return Redirect::to('/view_courses');
	}

	public function active_course($id)
	{
		DB::table('courses')
    			->where('course_id' , $id)
    	        ->update(['publication_status'=> 1]);
    	Session::put('message' , 'Course Active Successfully !');
    	return Redirect::to('/view_courses');
	} 

	public function delete_course ($id)
	{
		$delete_course = Course::where('course_id' , $id)->get();
		foreach ($delete_course as $d_course) 
		{
			$d_course->course_image;
		}
		unlink(public_path().'/backend/courses/'.$d_course->course_image);
   		DB::table('courses')
            ->where('course_id' , $id)
            ->delete();
            Session::put('message' , 'Course Deleted Successfully');
            return Redirect::to('/view_courses');

	}

	public function edit_course($id)
	{
		
    	$selected_course = DB::table('courses')
    						->join('majors','courses.major_id' ,'=' ,'majors.major_id')
    						->join('users','courses.user_id','=','users.id' )
    						->select('courses.*' , 'majors.major_name' , 'users.name')
    						->where('course_id' , $id)
    						->first();
    	return view('admin.update_course')->with('selected_course' , $selected_course);
	}

	public function save_update_course (Request $request , $id)
	{
		$this->validate($request, [
			'course_name' => 'required|string',
			'major_id' => 'required|integer',
			'user_id' => 'required|integer',
			'course_level' =>'required|string',
	        'course_price' =>'required|numeric',
	        'course_hours' =>'required|integer',
	        'course_image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $course = Course::where('course_id', $id)->firstOrFail();
		$data = array();
		$data['course_name'] = $request->course_name;
		$data['major_id'] = $request->major_id;
		$data['user_id'] =  $request->user_id;
		$data['course_content'] = $request->course_content;
		$data['course_level'] = $request->course_level;
		$data['course_price'] = $request->course_price;
		$data['course_hours'] = $request->course_hours;
		$data['publication_status'] =  $request->publication_status;


		if($request->hasFile('course_image'))
		{
		    unlink(public_path().'/backend/courses/'.$course->course_image);
			$image = $request->file('course_image');
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'backend/courses/';
			$image_url = $image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			if($success){
				$data['course_image'] = $image_url;
			}
		}

		$course = Course::where('course_id' , $id)->update($data);

		if($course)
		{
			Session::put('message' , 'Course Updated Successfully');
			return Redirect::to('/view_courses');
		}
		else
		{
			Session::put('message' , 'Course Updated Failed');
			return Redirect::to('/add_course');
		}

	}

	public function course_details ($course_id)
	{

		$course_info  = Course::where('course_id',$course_id)->first();

		$center_details = User::where('id',$course_info->user_id)->first();

		$center_name = $center_details->name;

		$major_details = Major::where('major_id',$course_info->major_id)->first();

		$major_name = $major_details->major_name;

		$related_courses = DB::table('courses')
							->where('major_id' , $major_details->major_id)
							->where('course_id','!=',$course_id)
							->where('publication_status' , 1)
							->limit(3)
							->get();

		return view('pages.product_details')->with(['course_info'=> $course_info,
			'center_name'=>$center_name ,
			'major_name' =>$major_name ,
			'related_courses'=>$related_courses
		]);
	}




}
