<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Helper\ProductHelper;

class CartController extends Controller
{
    public function postCart(Request $request) {
        $producthelper = new ProductHelper;
    	Cart::add([
    	  ['id' => $request->product_id, 'name' => $request->name, 'qty' => $request->qty, 'price' => $request->price]
    	]);	

    	if (Cart::content()) {
    		$msg = "Successfully added the " . $request->name;
    		return $producthelper->response(true, $msg);
    	}

        $msg = "Out of stock";
        return $producthelper->response(false, $msg); 
    }

    public function getCart() {
        $cart = Cart::content();
        if (count($cart) == 0) {
            return redirect('/');
        }
    	return view('cart');
    }

    public function removeCart(Request $request) {
        $producthelper = new ProductHelper;
        Cart::remove($request->rowId);
        $msg = "Successfully remove from cart";
        return $producthelper->response(true, $msg);
    }

}
