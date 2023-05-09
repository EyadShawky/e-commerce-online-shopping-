<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function addToCart($productID){
        $product = Product::findOrFail($productID);
        $cart = session()->get('cart' , []);

        if (isset($cart[$productID])){
            $cart[$productID]['quantity']++;
        }else{
            $cart[$productID]=[
                "product_name" => $product->product_name,
                "description" => $product->description,
                "price" => $product->price,
                "img"=>$product->img,
                "quantity" =>1
            ];
        }

        session()->put('cart' , $cart);
        return redirect()->back()->with('success' , 'product add to cart successfully !!');
    }

    public function cart(){
        return view('cart');
    }

    public function delete($productID)
    {
        $cart = session()->get('cart');

        if(isset($cart[$productID])) {
            unset($cart[$productID]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item has been removed from cart.');
    }
}
