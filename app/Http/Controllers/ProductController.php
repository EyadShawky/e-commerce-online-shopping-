<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $proudcts = Product::all();
        return view('product.index', [
            'proudcts'=>$proudcts
        ]);
    }

    public function show($productID) {
        $proudcts = Product::findOrFail($productID);
        return view('product.Show', [
            'proudcts'=>$proudcts
        ]);
    }

    public function create(){
        return view('product.create',[
            'categories'=>Category::all(),
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'product_name' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'categories_id' => 'required|integer',
            'img'=>'required|image|mimes:png,jpg|max:1000240',
        ]);
        $fileName = Storage::putFile("public/product" , $data['img']);
        $data['img'] =str_replace('public/' , 'storage/' , $fileName);
        Product::create($data);
        return redirect(url('/admin/products'));
    }

    public function destory($productID){
        Product::findOrFail($productID)->delete();
        return redirect(url('/admin/products'));
    }





}
