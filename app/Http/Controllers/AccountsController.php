<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function index() {
        $users = User::all();
        return view('account.index', [
            'users'=>$users,
        ]);
    }

    public function customerIndex () {
        $customers = User::select('id' , 'name' , 'email' , 'role_id' , 'address')
            ->where('role_id','=', 3)
            ->orderBy('id' , 'DESC')
            ->get();;
        return view('customers.index', [
            'customers'=>$customers
        ]);
    }

    public function showCustomer($userID) {
        $customers = User::findOrFail($userID);
        return view('customers.Show', [
            'customers'=>$customers
        ]);
    }

    public function show($userID) {
        $users = User::findOrFail($userID);
        return view('account.Show', [
            'users'=>$users
        ]);
    }

    public function create(){
        return view('account.create',[
            'roles'=>Role::all(),
        ]);
    }

    public function register(Request $request)
    {
        $inputs = $request->all();

        $v = validator($inputs, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role_id' => 'required|integer'
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role_id = $request['role_id'];
        $user->save();
        return redirect( url('/admin/accounts') );
    }
    
}
