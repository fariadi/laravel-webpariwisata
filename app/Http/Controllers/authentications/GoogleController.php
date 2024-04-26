<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; //tambahkan library socialite
use App\Models\User;

use Carbon\Carbon;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        try {
            if(!$user_google = Socialite::driver('google')->user()) {
                return redirect()->route('pages-home');
            };

            $user = User::where('email', $user_google->getEmail())->first();
    
            if($user != null){
                if (! Auth::loginUsingId($user->id)) {
                    return redirect()->route('auth-login');
                }

                /**
                 * Login With Administrator
                 */
                if(Auth::user()->hasRole('admin')) {
                    return redirect()->intended('dashboard');
                }
                /** End */
                
                /**
                 * Login With Peserta
                 */
                if(Auth::user()->hasRole('peserta')) {
                    if(Auth::guard('peserta')->loginUsingId(Auth::user()->id)) {
                        return redirect()->intended('home');
                    };
                }
                /** End */
            }

            /**
             * Create New Users
             */
            $create = [
                'email'             => $user_google->getEmail(),
                'name'              => $user_google->getName(),
                'password'          => null,
                'email_verified_at' => now()
            ];

            $user = new User($create);

            if($user->save()) 
            {
                $groups = ['user_id' => $user->id, 'role_id' => 2];
                $groupCreate = \App\Models\UserRole::create($groups);
            }
            else {
                return redirect()->route('pages-login');
            }

            Auth::loginUsingId($user->id);
            Auth::guard('peserta')->loginUsingId($user->id);

            return redirect()->route('pages-home');
            
        } catch (\Exception $e) {
            redirect()->route('pages-login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        /*
        if(Auth::guard('peserta')->check()) {
            Auth::guard('peserta')->logout();
        }
        */
        request()->session()->invalidate();
        request()->session()->regenerateToken();
 
        return redirect('page-login');
    }
}
