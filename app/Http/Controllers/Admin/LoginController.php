<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 1,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('1234')
                ]);

                Auth::login($createUser);
                return redirect()->route('admin');
            }

        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }

}
