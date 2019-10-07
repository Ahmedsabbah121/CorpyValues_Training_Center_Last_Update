<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Trainee;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Hash;
use validator;
use Session;
session_start();

class TraineeController extends Controller
{
    public function index_trainee()
    {
    	return view('trainee.add_trainee');
    }

    public function add_back_trainee()
    {
    	return view('admin.add_back_trainee');
    }

    public function view_trainees ()
    {
    	$all_trainees = User::where('type' , 'trainee')->get();
    	return view('admin.view_trainees')->with('all_trainees' , $all_trainees);
    }

    public function get_profile(Request $request)
    {
        if(Auth::user()->type == 'trainee')
        {
			$user = \App\User::where('id' , auth()->user()->id)->with('trainee')->first();
			$user_orders = DB::table('orders')->where('user_id',$user->id)->get();
			for($i=0;$i<count($user_orders);$i++){
				$order_details = DB::table('order_details')->where('order_id',$user_orders[$i]->order_id)->get();
			}
			//dd($order_details);
            return view('trainee.trainee_home')->with([
				'user'=>$user,
				'order_details'=>$order_details
				]);
        }
        else
        {
            $user = \App\User::where('id' , auth()->user()->id)->with('center')->first();
            return view('center.center_home')->with('user',$user);
        }
    }

    public function save_trianee (Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' =>'required|string|max:30',
		    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$data = array();
		$image = $request->file('image');
		if($image){
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'frontend/images/upload/trainee';
			$image_url = $image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			if($success){
				$data['image'] = $image_url;
			}
		}
    	$user = User::firstOrCreate([  //protection against duplicate entry
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'city' => $request->city,
        'address' => $request->address,
        'image' => $data['image'],
        'type' => 'trainee'
   		 ]);

    	if($user)
    	{
    		$tr_status = $request->status;
    		if($tr_status)
    		{
    			$trainee_status = $user->trainee()->create([
				    'status' => $tr_status
				]);
    		}

    		if(Auth::attempt(['email'=> request()->email , 'password' => request()->password]))
	        {
                return redirect()->intended('/');
	        }
	        else
	        {
	            Session::put('message' , 'Please Review your Input data');
	            return redirect()->back();
	        }
    	}
    	else
    	{
    		echo "Error";
    	}
    }//end function 

    public function unactive_trainee ($id)
    {
    	DB::table('users')
    			->where('id' , $id)
    	        ->update(['publication_status'=> 0]);
    	Session::put('message' , 'Trainee UnActive Successfully !');
    	return Redirect::to('/view_trainees');
    }

    public function active_trainee ($id)
    {
    	DB::table('users')
    			->where('id' , $id)
    	        ->update(['publication_status'=> 1]);
    	Session::put('message' , 'Trainee Active Successfully !');
    	return Redirect::to('/view_trainees');
    }

    public function delete_trainee ($id)
    {
    	$user = User::find($id);
    	unlink(public_path().'/frontend/images/upload/trainee/'.$user->image);

    	$user->trainee()->delete();

    	$user->delete();

    	Session::put('message' , 'Traniee Deleted Successfully');
       	return Redirect::to('/view_trainees');
    }

    public function edit_trainee($id)
    {
    	$selected_trainee = User::where('id',$id)->with('trainee')->first();
    	return view('admin.update_trainee')->with('selected_trainee' , $selected_trainee);
    }

    public function save_update_trianee (Request $request , $id)
    {
    	$user = User::find($id);

    	$this->validate($request, [
    		'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            // 'password' => 'string|min:6',
            'phone' => 'string|max:255',
            'city' => 'string|max:255',
            'address' => 'string|max:255',
            'status' =>'string|max:30',
		    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->phone = $request->phone;
		$user->city = $request->city;
		$user->address = $request->address;
		$user->type = 'trainee';
		
		$image = $request->file('image');

		if($request->hasFile('image'))
		{
			unlink(public_path().'/frontend/images/upload/trainee/'.$user->image);
	
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'frontend/images/upload/trainee/';
			$image_url = $image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			if($success)
			{
				$data['image'] = $image_url;
			}

			$user->image = $data['image'];
		}


		$user->save();

		if($user->save())
		{
			$trainee = Trainee::where('user_id', $id)->first();
			$trainee ->status = $request->status;
			$trainee ->save();

			Session::put('message' , 'Trainee Updated Successfully');
			return Redirect::to('/view_trainees');
		}
		else
		{
			Session::put('message' , 'Trainee Updated Failed');
			return Redirect::to('/add_back_center');
		}

    }
public function profile(Request $id){
	//give me user_id and get orders related to him 
	
}





}
