<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

  
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> request()->email , 'password' => request()->password]))
        {
            return redirect('/');
        }
        else
        {
            // return redirect()->back()->withInput('username');
            Session::put('message' , 'Invalid Email or Password');
            return redirect()->back();
        }
    }

          //custimoize on login with username or email
            // public function field()
            // {
            //     if(filter_var(request()->username , FILTER_VALIDATE_EMAIL))
            //     {
            //         return "email";
            //     }
            //     else
            //     {
            //         return "username";
            //     }
            // }

    
            // if(Auth::user()->type == 'trainee')
            // {
            //     $user = \App\User::where('id' , auth()->user()->id)->with('trainee')->first();
            //     // dd($user ->toArray());
            //     return view('trainee.trainee_home')->with('user',$user);
            // }

           // else 
           // {
           //   $user = new User;
           //      $tr_status = $request->status; 
           //      if($tr_status)
           //      {
           //          $trainee_status = $user->trainee()->create([
           //              'status' => $tr_status
           //          ]);
           //      }

           //          $data_pass['user'] = $user;
           //          $data_pass['status'] = $tr_status;
                     
           //          return view('trainee.trainee_home',compact(['data_pass']));
    
           // }

}
