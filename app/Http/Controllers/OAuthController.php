<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Session;

class OAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        try{
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id',$google_user->getId())->first();
            //dd($google_user->getId());
            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'username' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                \Auth::login($new_user);
                return redirect()->intended(Session::get('url'));
            }else{
                \Auth::login($user);
                return redirect()->intended(Session::get('url'));
            }
        }
        catch(\Throwable $th){
            dd('Error: '.$th->getMessage());
        }
    }
}
