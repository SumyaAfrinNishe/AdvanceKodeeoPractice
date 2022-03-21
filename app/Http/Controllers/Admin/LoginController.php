<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
       return view('admin.pages.Login.login');
    }

    public function doLogin(Request $request){
      
        $userpost=$request->except('_token');
   
        if(Auth::attempt($userpost))
        {
            return redirect()->route('admin.home')->with('success','Login Successful');
        }
        else
        return redirect()->route('admin.login')->withErrors('error','Invalid user credentials');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Logging out.');
    }

}
