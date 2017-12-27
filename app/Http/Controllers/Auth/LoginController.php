<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Composer\DependencyResolver\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
//use Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
            // new rules here
        ]);
    }

     public function login(Request $request)
     {
         // $user_name = $request->input('username');
         // $pw = Hash::make($request->input('password'));
         $credentials = [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ];

            // Dump data
//             dd($credentials);

            if (Auth::attempt($credentials)) {
//                return redirect()->route('dashboard');
                if(Auth::check())
                   echo "loginSUccess";
                return redirect("/");
            }else
            echo "not loginSUccess  ";
     }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

}
