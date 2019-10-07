<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Course;
use App\User;
use App\Wishlist;
use App\Card;
use Auth;
use DB;
use Session;
session_start();

class WishlistController extends Controller
{
    public function add_wishlist (Request $request)
    {
        
        if(Auth::check()){
            $course_id = explode ("-", $request->slug);
            $customer_id = Auth::user()->id;
            $check_if_exist = DB::table('wishlists')->where('customer_id',$customer_id)->where('course_id',$course_id[1])->get();
            // dd($check_if_exist);
            if(count($check_if_exist)==0){
                DB::table('wishlists')->insert([
                    'customer_id'=> $customer_id,
                    'course_id'=> $course_id[1],
                    'created_at'=> new \DateTime(),
                    'updated_at'=> new \DateTime()
                ]);
                return Redirect::to('/wishlist_content');
            }
            else{
                return back();
            }
        
        }
        else{
            return redirect('/login');
        }
        
        // $course_id = $request->slug;
        // $course = DB::table('courses')->where('course_id',$course_id)->get();
        // dd($course_id);\
        // dd($course_id[1] , $customer_id , $check_if_exist);
        
    }

    public function delete_from_wishlist(Request $request , $id){
        $user_id = Auth::user()->id;
        $delete = DB::table('wishlists')
                            ->where('customer_id',$user_id)
                            ->where('course_id',$id)->delete();
        if($delete){
            return back();
        }
    }
    public function get_wishlist ()
    {
    	$wish_courses = DB::table('courses')
                            ->join('wishlists','courses.course_id' ,'=' ,'wishlists.course_id')
                            ->join('users','courses.user_id','=','users.id' )
                            ->select('courses.*' , 'users.name')
                            ->where('wishlists.customer_id', '=' ,Auth::user()->id)
                            ->get();       
        return view('pages.wishlist_content')->with('wish_courses' , $wish_courses);
    }

    public function add_card_table (Request $request  , $course_id)
    {   
        $course_info = Course::find($course_id);
        $center_id = $course_info->user_id;
        $center_info = User::find($center_id);
        $center_name = $center_info->name;

        $card  = new Card;

        $card->course_id = $course_info->course_id;
        $card->customer_id = Auth::user()->id;
        $card->course_name = $course_info->course_name;
        $card->center_name = $center_name;
        $card->course_level = $course_info->course_level;
        $card->course_price = $course_info->course_price;
        $card->course_image = $course_info->course_image;
        $card->save();

        DB::table('wishlists')
            ->where('course_id' , $course_id)
            ->delete();

        $card_items = Card::all();
        // echo "<pre>"; print_r($card_items); echo "</pre>"; die;
        return view('pages.card_content')->with('card_items',$card_items);
    }



}
