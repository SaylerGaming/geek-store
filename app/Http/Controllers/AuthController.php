<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{
    public function auth()
    {
        return view('auth');
    }
 
    public function register(Request $request)
    {
        if($request->register_password != $request->register_password_confirtmation) {
            return back()->with('register-error', 'passwords don`t match');
        }
        $user = new User();
 
        $user->name = $request->register_name;
        $user->email = $request->register_email;
        $user->password = Hash::make($request->register_password);
 
        $user->save();

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/')->with('success', 'Register successfully');
        }
 
        return redirect('/')->with('success', 'Register successfully');
    }
 
    public function login(Request $request)
    {
        $credetials = [
            'email' => $request->login_email,
            'password' => $request->login_password,
        ];
 
        if (Auth::attempt($credetials)) {
            return redirect('/')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect('/');
    }
}