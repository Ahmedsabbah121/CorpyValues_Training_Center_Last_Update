<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slider;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;
session_start();

class SliderController extends Controller
{
    public function add_slider()
    {
    	return view('admin.add_slider');
    }
    public function save_slider(Request $request)
    {
		$validator = Validator::make($request->all(), [
		    'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		if ($validator->fails()) {
		    echo "error";
		    return Redirect::to('/add_slider');
		}
		else
		{
			// echo "<pre>" ;print_r($request->all()); echo "</pre>";
			$data = array();
	    	$data['publication_status'] = $request->publication_status;
	    	$image = $request->file('slider_image');

			if($image){
				$image_name = str_random(20);
				$ext = strtolower($image->getClientOriginalExtension());
				$image_full_name = $image_name.'.'.$ext;
				$upload_path = 'frontend/images/upload/slider';
				$image_url = $image_full_name;
				$success=$image->move($upload_path,$image_full_name);
				if($success){
					$data['slider_image'] = $image_url;
					DB::table('sliders')->insert($data);
					Session::put('message' , 'Slider added Successfully');
					return Redirect::to('/view_sliders');
				}
			}
			else
			{
				Session::put('message' , 'Slider Added Failure');
				return Redirect::to('/add_slider');
			}
		}
    }

    public function view_sliders()
    {
    	$all_sliders = DB::table('sliders')
    					->where('publication_status' , 1)
    					->get();
    	// echo "<pre>"; print_r($all_sliders); echo "</pre>"; die;
    	return view('admin.view_sliders')->with('all_sliders',$all_sliders);
    }


    public function unactive_slider ($slider_id)
    {
    		DB::table('sliders')
    	    ->where('slider_id' , $slider_id)
    	    ->update(['publication_status' => 0]);
        	Session::put('message' , ' Slider UnActive Successfully !');
    	    return Redirect::to('/view_sliders');  
    }

    public function active_slider ($slider_id)
    {
    	// echo $slider_id;
			DB::table('sliders')
    	    ->where('slider_id' , $slider_id)
    	    ->update(['publication_status' => 1]);
        	Session::put('message' , ' Slider Active Successfully !');
    	    return Redirect::to('/view_sliders'); 
    }

    public function delete_slider($slider_id)
    {
    	// echo $slider_id;
    	$selected_slider = Slider::where('slider_id' , $slider_id)->get();
    	foreach ($selected_slider as $delete_slider) {
    		$delete_slider->slider_image;
    	}
    	// unlink(public_path().'/frontend/images/upload/slider/'.$delete_slider->slider_image);
   		DB::table('sliders')
            ->where('slider_id' , $slider_id)
            ->delete();
            Session::put('message' , 'Slider Deleted Successfully');
            return Redirect::to('/view_sliders');
    	// echo "<pre>"; print_r($delete_slider->slider_image); echo "</pre>"; die;
    }

}
