<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'address' => 'required|string|max:255',
            'password' =>'required|string|min:5|max:30|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role_id'] = Role::where('id' , 3)->first()->id;
        $user = User::create($data);
        Auth::login($user);
        return redirect( url('/admin/categories') );
    }



    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' =>'required|string|min:5|max:30',
        ]);

        $islogin = Auth::attempt(['email'=>$data['email'] , 'password' => $data['password']]);
        if (!$islogin){
            return back()->withErrors(['credentials not correct']);
        }
        return redirect( url('/admin/categories') );
    }
    public function loginForm(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }

}
