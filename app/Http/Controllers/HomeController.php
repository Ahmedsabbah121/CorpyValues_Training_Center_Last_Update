<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;
use App\User;
use App\Course;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return 'test';
    } 
    public function about($id){
        return view('pages.about',compact('id'));
    }
    public function HomeData()
    {
		if(Auth::check()){
			$user_id = Auth::user()->id;
            $user_wishlist  = DB::table('wishlists')->where('customer_id',$user_id)->get();
            $user_cards = DB::table('cards')->where('customer_id',$user_id)->get();
            // dd($user_cards);
		}
		else{
			$user_wishlist = array();
		}
		// dd($user_id); 
		$data_array = array();
		$sliders = DB::table('sliders')->where('publication_status',1)->get();
        $home_courses = DB::table('courses')
                            ->join('majors','courses.major_id' ,'=' ,'majors.major_id')
                            ->join('users','courses.user_id','=','users.id' )
                            ->select('courses.*' , 'majors.major_name' , 'users.name')
                            ->where(['majors.publication_status'=> 1 , 'users.publication_status'=> 1])
							->paginate(10);
			// foreach($home_courses as $course)
			// {
			// 		foreach($user_wishlist as $wishlist){
			// 			if($course->course_id !== $wishlist->course_id){
			// 				if( $user_id !== $wishlist->customer_id){
			// 					$course->status = 'success';
			// 				}
			// 				else{
			// 					$course->status = 'fail';
			// 				}
			// 			}
			// 			else{
			// 				$course->status = 'fail';
			// 			}
			// 		}
			// }
			for($i = 0; $i < count($home_courses); $i++){
				for($j = 0; $j < count($user_wishlist); $j++){
					if( $user_id == $user_wishlist[$j]->customer_id){
						if( $home_courses[$i]->course_id == $user_wishlist[$j]->course_id){
							$home_courses[$i]->status = 'success';
						}
					}else{
						$home_courses[$i]->status = 'fail';
					}
					
				}
            }
            for($i = 0; $i < count($home_courses); $i++){
				for($j = 0; $j < count($user_cards); $j++){
					if( $user_id == $user_cards[$j]->customer_id){
							$home_courses[$j]->card_status = 'success';
					}else{
						$home_courses[$i]->card_status = 'fail';
					}
					
				}
			}
			// return($home_courses);
		return view('pages.home_content' ,[
			'home_courses'=> $home_courses,
			'sliders'=>$sliders,
			]);	
    }
}
