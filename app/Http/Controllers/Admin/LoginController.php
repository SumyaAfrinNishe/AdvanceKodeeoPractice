<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

use App\Jobs\SendResetPasswordJob;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\App;

class LoginController extends Controller
{

    //membership

    public function membership()
    {
        return view('Login.membership');
    }

    public function membershipGet($type)
    {
        if($type == 'free')
        {
            //make free membership
            $user=User::find(auth()->user()->id);
            $user->update([
                'membership_type'=>'free'
            ]);
            return redirect()->route('admin.home');
        }

        elseif ($type =='premium')
        {
            //decide price
            $price =100;
        }
        else{
            $price=150;
        }

        //make payment via ssl commerz
      return view('Login.membership');
    }


    
    //localization
    public function test()
    {
        return view('test');
    }

    public function changeLanguage($local)
    {
       App::setlocale($local);
       session()->put('applocale',$local);
       return redirect()->back();
    }

    public function package()
    {
        $user=User::all();
        return $user;
    }

    //login work start from here
    public function login()
    {
       return view('admin.pages.Login.login');
    }

    public function doLogin(Request $request){
      
        $userpost=$request->except('_token');
   
        if(Auth::guard('web')->attempt($userpost) || Auth::guard('admin')->attempt($userpost))
        {
            Toastr::success('User Login Successfully','success');
            return redirect()->route('admin.home');
        }
        else
        return redirect()->route('admin.login')->withErrors('error','Invalid user credentials');

    }

    public function logout()
    {
        Auth::guard('web')->logout() || Auth::guard('admin')->logout();
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

                // Mail::to($request->email)->send(new ResetPasswordEmail($link));

                dispatch(new SendResetPasswordJob($link, $user->email));
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



