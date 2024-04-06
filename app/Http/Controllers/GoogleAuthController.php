<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
    
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){

        try{
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id',$google_user->getId())->first();
            if(!$user){
               $new_user =  User::create([
                    'name' =>$google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
               ]);
              
             $new_user->client()->create();
            
               event(new Registered($user));
               Auth::login($new_user);
               return redirect('/home');
            }else{
                Auth::login($user);
                return redirect()->intended('/home');
            }

        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }
}
