<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{

    public function __construct() { 
        if(!session('cart')){
            session(['cart' => []]);
        }
    }

    public function auth()
    {
        return view('auth');
    }
 
    public function register(Request $request)
    {
        if($request->register_password != $request->register_password_confirtmation) {
            return back()->with('register-error', 'passwords don`t match');
        }
        $user = User::create([
            'name' => $request->register_name,
            'email' => $request->register_email,
            'password' => Hash::make($request->register_password)
        ]);

        Auth::login($user, true);
 
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