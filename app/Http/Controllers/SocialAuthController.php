<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SocialAuthController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(){
        try {
            $user = Socialite::driver('google')->user();
        } catch(\Exception $e) {
            return redirect('/auth');
        }

        $existingUser = User::where('google_id', $user->id)->first();

        if($existingUser) Auth::login($existingUser, true);
        else {
            $newUser = User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'google_id'=>$user->id,
                'password'=>Hash::make('google')
            ]);
            Auth::login($newUser, true);
        }
        return redirect('/');
    }
}
