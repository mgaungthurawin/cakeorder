<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Admin\Order;

class DashboardController extends Controller
{

    public function index() {
    	return view('msisdn');
    }

    public function postPhone(Request $request) {
    	$customer = Customer::where('phone', $request->phone)->first();
    	if ($customer) {
    		Session::put('phone', $customer->phone);
    		$order = Order::where('customer_id', $customer->id)->get();
    		return redirect('dashboard');
    	}

    	return redirect('/');
    }

    public function dashboard() {
    	$customer = Customer::where('phone', Session::get('phone'))->first();
        $customer_id = $customer->id;
        $order = Order::join('products','products.id', 'orders.product_id')
                        ->where('orders.customer_id', $customer_id)->paginate('10');
        return view('dashboard', compact('customer', 'order'));
    }


}
