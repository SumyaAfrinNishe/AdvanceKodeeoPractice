<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
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
                return redirect()->route('admin.home');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('1234')
                ]);

                Auth::login($createUser);
                return redirect()->route('admin.home');
            }

        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try{
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin.home');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('1234')
                ]);

                Auth::login($createUser);
                return redirect()->route('admin.home');
            }

        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
        }
    }


