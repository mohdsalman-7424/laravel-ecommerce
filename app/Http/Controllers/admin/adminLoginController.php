<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class adminLoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('admin.auth.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }
        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
    // public function product(){
    //     return view('admin.product');
    // }
}
