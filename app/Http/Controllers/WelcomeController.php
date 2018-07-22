<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;

class WelcomeController extends Controller
{
    public function index(Request $request) {

        $categories = Category::all();
        $products = Product::all();

        if ($request->get('name')) {
            $products = Product::where('title', 'like', '%' . $request->get('name') . '%')->paginate(10);
        }
    	
        return view('welcome', compact('categories', 'products'));
    }

    public function cart(Request $request) {
    	return $request->all();
    }

    public function about() {
    	return view('about');
    }

    public function contact() {
    	return view('contact');
    }

}
