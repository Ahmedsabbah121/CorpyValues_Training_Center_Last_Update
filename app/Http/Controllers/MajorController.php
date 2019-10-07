<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class MajorController extends Controller
{
    public function index ()
    {
    	return view ('admin.add_major');
    }

    public function save_major(Request $request)
    {
    	$data = array();
    	$data['major_id'] = $request->major_id;
    	$data['major_name'] = $request->major_name;
    	$data['major_desc'] = $request->major_desc;
    	$data['publication_status'] = $request->publication_status;
    	DB::table('majors')->insert($data);
    	Session::put('message' , 'Major added Successfully !');
    	return Redirect::to('/add_major');
    }

    public function view_majors ()
    {
    	$all_major_info = DB::table('majors')->get();
    	return view('admin.view_majors')->with('all_major_info' , $all_major_info);
    }

    public function unactive_major ($major_id)
    {
    	DB::table('majors')
    	    ->where('major_id' , $major_id)
    	    ->update(['publication_status' => 0]);
        	Session::put('message' , 'major UnActive Successfully !');
    	    return Redirect::to('/view_majors');

    }

    public function active_major($major_id)
    {
    	DB::table('majors')
    	    ->where('major_id' , $major_id)
    	    ->update(['publication_status' => 1]);
        	Session::put('message' , 'major Actived Successfully !');
    	    return Redirect::to('/view_majors');
    }

    public function edit_major ($major_id)
    {
        
    	$major_info = DB::table('majors')
    					->where('major_id' , $major_id)
    					->first();
    	return view('admin.update_major')->with('major_info' , $major_info);

    }

    public function save_update_major (Request $request , $major_id)
    {
    	$data = array();
    	$data['major_name'] = $request->major_name;
    	$data['major_desc'] = $request->major_desc;

    	DB::table('majors')
    		->where('major_id' ,$major_id)
    		->update($data);

    		Session::put('message' , 'Major Updated Successfully');

    		return Redirect::to('/view_majors');
    }

    public function delete_major ($major_id)
    {
        DB::table('majors')
            ->where('major_id' , $major_id)
            ->delete();

            Session::put('message' , 'Major Deleted Successfully');
            return Redirect::to('/view_majors');

    }




}
