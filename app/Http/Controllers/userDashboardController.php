<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\User;

class userDashboardController extends Controller
{
    public function index(){
        $hoodies = Product::select('id' , 'product_name' , 'price' , 'img')
            ->where('categories_id','=', '1')
            ->orderBy('id' , 'DESC')
            ->take(3)
            ->get();

        $pants = Product::select('id' , 'product_name' , 'price' , 'img')
            ->where('categories_id','=', '2')
            ->orderBy('id' , 'DESC')
            ->take(3)
            ->get();

        $user = User::all();

        return view('UserView.index', [
            'hoodies'=>$hoodies,
            'pants'=>$pants,
            'users'=>$user
        ]);
    }

    public function viewHoodies(){
        $proudcts = Product::select('id' , 'product_name' , 'price' , 'img')
            ->where('categories_id','=', '1')
            ->orderBy('id' , 'DESC')
            ->get();
        return view('UserView.hoodies' , [
            'proudcts'=>$proudcts,
        ]);
    }

    public function viewPants(){
        $proudcts = Product::select('id' , 'product_name' , 'price' , 'img')
            ->where('categories_id','=', '2')
            ->orderBy('id' , 'DESC')
            ->get();
        return view('UserView.pants' , [
            'proudcts'=>$proudcts,
        ]);
    }


}
