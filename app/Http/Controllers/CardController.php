<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Card;
use App\Course;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Session;
use Validator;
session_start();

class CardController extends Controller
{
    public function add_to_card(Request $request)
    {
		if(Auth::check()){
			$course_id = (int)$request->id;
			$user_id = Auth::user()->id;
			$is_exist = DB::table('cards')->where('customer_id',$user_id)->where('course_id',$course_id)->first();
			if(empty($is_exist)){
				DB::table('cards')->insert([
					'customer_id' => $user_id,
					'course_id' => $course_id,
					'created_at' => new \DateTime(),
					'updated_at' => new \DateTime()
				]);
					return Redirect::to('/card_content');
			}else{
				return back();
			}
		}
		else{
			return redirect('/login');
		}
    }

    public function card_content (Request $request)
    {
        if(Auth::check())
        {
			$card_items = DB::table('cards')
			->select('cards.id as card_id','cards.course_id as card_course_id',
					'courses.course_name as course_name','courses.course_level as course_level','courses.course_price as course_price'
					,'courses.course_hours as course_hours','courses.course_image as course_image','users.name as academy_name'
			)
			->join('courses','courses.course_id','cards.course_id')
			->join('users','users.id','courses.user_id')
			->where('cards.customer_id',Auth::user()->id)
			->get();
			// return ($card_items);
            return view('pages.card_content')->with('card_items',$card_items);
        }
        else
        {
            return redirect::to('/login');

        }

    }

    public function delete_item ($id)
    {

    	$deleted_card = Card::destroy($id);

    	if($deleted_card)
    	{
    		return Redirect::to('/card_content')->with('flash_message_success' , 'Recored Deleted Successfully');
    	}
    	else
    	{
    		return Redirect::to('/card_content')->with('flash_message_error' , 'Recored Deleted Failed');
    	}
    }


}
