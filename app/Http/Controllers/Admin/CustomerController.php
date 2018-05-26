<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function index() {
    	$customers = Customer::orderBy('id', 'DESC')->paginate(20);
    	return view('admin.customer.index', compact('customers'));
    }
}
