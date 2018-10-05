<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Flash;

class DeleteCustomerController extends Controller
{
    public function delete(Request $request) {
    	$data = $request->all();
    	$arr = $data['customer'];
    	Customer::whereIn('id', $arr)->delete();
    	Flash::success('successfully delete customers');
    	return '/customer';
    }
}
