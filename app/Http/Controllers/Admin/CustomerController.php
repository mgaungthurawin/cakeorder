<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function index(Request $request) {

    	if ($request->get('phone')) {
    		$customers = Customer::where('phone', $request->get('phone'))->paginate(20);
    		return $this->indexpage($customers);
    	}

    	$customers = Customer::orderBy('id', 'DESC')->paginate(20);
    	return $this->indexpage($customers);
    }

    private function indexpage($customers) {
        return view('admin.customer.index', compact('customers'));
    }
}
