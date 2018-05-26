<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;

class WelcomeController extends Controller
{
    public function index() {
    	$categories = Category::all();
    	$products = Product::all();
    	return view('welcome', compact('categories', 'products'));
    }

    public function cart(Request $request) {
    	return $request->all();
    }
}
