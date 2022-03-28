<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;

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

        public function forgetPassword()
        {
            return view('admin.pages.reset-password.forget');
        }

        public function forgetPasswordPost(Request $request)
        {
            $request->validate([

                'email'=>'required|exists:users'
            ]);

            try{
                $token=Str::random(40);
                $user=User::where('email',$request->email)->first();
                $user->update([
                  'reset_token'=>$token,
                  'reset_token_expire_at'=>Carbon::now()->addMinute(2),
                ]);
                
                $link=route('reset.password',$token);

                Mail::to($request->email)->send(new ResetPasswordEmail($link));
                return redirect()->back()->with('msg','Email sent to :'. $request->email);
            }
            catch(\Throwable $exception)
            {
                dd($exception->getMessage());
            }
            
        }

        public function resetPassword($token)
        {
            return view('admin.pages.reset-password.reset',compact('token'));
        }

        public function resetPasswordPost(Request $request)
        {
            $userHasToken=User::where('reset_token',$request->reset_token)->first();
            if($userHasToken)
            {
                if($userHasToken->reset_token_expire_at>=Carbon::now()){
                    $userHasToken->update([
                       'password'=> bcrypt($request->password),
                        'reset_token'=>null
                    ]);
                    return redirect()->back()->with('msg','Password Reset Successful.');

            }
            else
            {
                return redirect()->back()->withErrors('Token Expired.');
            }
        }
        else
    {
        return redirect()->back()->withErrors('Token not found.');
    }
    }

    }



