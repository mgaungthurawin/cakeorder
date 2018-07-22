<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Order;

class FilterController extends Controller
{
    public function orderfilter(Request $request) {
    	$orders = Order::where('order_id' , $request->order_id)
    					->orWhere($request->order_id, $request->order_id)
    					->get();
    	return $orders;
    }
}
