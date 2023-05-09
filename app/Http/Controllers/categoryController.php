<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index() {
        $categories = Category::all(); //select * from categroy.
        return view('categories.index', [
            'categories'=>$categories
        ]);
    }

    public function show($categoryID) {
        $categories = Category::findOrFail($categoryID);
        return view('categories.Show', [
            'categories'=>$categories
        ]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'category' => 'required|string|max:100',
        ]);

        Category::create($data); 
        return redirect(url('/admin/categories'));
    }

    public function destory($categoryID){
        Category::findOrFail($categoryID)->delete();
        return redirect(url('/admin/categories'));
    }
}
