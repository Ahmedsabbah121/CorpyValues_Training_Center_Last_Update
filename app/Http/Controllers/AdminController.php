<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Course;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Hash;
use validator;
use Auth;
session_start();

class AdminController extends Controller
{
    public function index()
    {

    	return view('admin_login');
    }

    public function dashboard_get()
    {
		$center_num = User::where('type','center')->count();
		$trainee_num = User::where('type','trainee')->count();
		$course_num = Course::count();

		$latest_trainee = User::where('type' , 'trainee')
						  ->orderBy('created_at', 'des')
		                  ->take(4)
		                  ->get();

    	return view('admin.dashboard' , [
    		'center_num' => $center_num , 
    		'trainee_num' => $trainee_num ,
    		'course_num' => $course_num,
    		'latest_trainee' => $latest_trainee ]);
    }

    public function dashboard(Request $request)
    {
    	if(Auth::attempt(['email'=>request('email') , 'password'=>request('password')]))
		{
				$user = \App\User::where('id' , auth()->user()->id)->first();
				// dd($user->toArray());
				Session::put('admin_name' ,  $user->name);
				Session::put('admin_id' , $user->id);	
				return redirect('admin_dashboard');
		}
		else
		{
			Session()->flash('error' , 'Inccorrect_info');
			return redirect('admin_login');
		}
  
	} //end function


	public function logout()
	{
		Session::flush();
		return Redirect::to('/');
	}

}


		// $this->validate($request,[
  //       'admin_email' => 'required|email|',
  //       'admin_password' => 'required|min:6',
		// ]);  

		// $rememberme = request('rememberme') == 1 ? true : false;
	 //    if (auth()->guard('admin')->attempt(['email' => request('admin_email'), 'password' => request('admin_password')], $rememberme)) {
	 //        return redirect('admin_dashboard');
	 //    } else {
	 //        Session()->flash('error', trans('admin_incorect_login'));
	 //        return redirect(url('admin_login'));
	 //    }


	
		// if(auth()->guard('admin')->attempt(['admin_email'=>request('admin_email') , 'admin_password'=>request('admin_password')]))
		// {
		// 	return redirect('admin_dashboard');
		// }
		// else
		// {
		// 	Session()->flash('error' , 'Inccorrect_info');
		// 	return redirect('admin_login');
		// }




//   	$admin_email = $request->admin_email;
  //   	$user_pass =  DB::table('admins')->where('admin_email',$admin_email)->get();
		// if ($user_pass->isEmpty()) {
		// 	return 'no user';
		// }else{
		// 		$admin_password = $request->admin_password;
		// 		foreach ($user_pass as $password_user) {

		// 			  $db_pass = $password_user->admin_password;
					 
		// 			$db_name =   $password_user->admin_name;
		// 			$db_id = $password_user->id;

		// 		}	

		//    if( Hash::check($admin_password,  $password_user->admin_password))
		// 	{
		// 		Session::put('admin_name' ,  $password_user->admin_name);
		// 		Session::put('admin_id' , $password_user->id);	
		// 		return redirect('/admin_dashboard');

		// 	}else{
		// 		Session::put('message' , ' password Invalid');
		// 		return Redirect::to('/admin_login');
		// 	}
		// }
