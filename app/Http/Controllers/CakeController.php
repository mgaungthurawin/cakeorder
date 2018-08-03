<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\Order;
use App\Customer;
use Flash;
use App\Http\Requests\CakeRequest;
use Session;
use App\Helper\WaveHelper;
use App\Helper\ProductHelper;
use Alert;

class CakeController extends Controller
{
    public function cakedetail($id, $location, $delivary) {

    	$product = Product::find($id);
    	if (empty($product)) {
            alert()->error('product no found', 'OOh..')->persistent("Close");
            return redirect()->back();
    	}

        Session::put('product_id', $product->id);
        Session::put('location', $location);
        Session::put('delivary', $delivary);
    	return view('cakedetail', compact('product'));
    }


    public function order(){
        return view('order');
    }

    public function postOrder(Request $request) {
        $mdn = $request->phone;
        $wave = new WaveHelper;
        $msisdn = $wave->transform_msisdn($mdn);
        $country = $wave->country($msisdn);
        $operator = $wave->operator($msisdn, $country);

        $msisdn = $this->modify_msisdn($msisdn);
        $customer_id = $this->customer_creation($request->all());

        $product_id = Session::get('product_id');
        $producthelper = new ProductHelper;
        $producthelper->decreaseproduct($product_id, 1);
        $this->order_creation($product_id, $customer_id);
        Alert::success('Successfully saved', 'Oops!')->persistent('Close');
        Session::put('phone', $request->phone);
        return redirect('/');

        // if ($country == "Myanmar (Burma)") {
        //     $country_id = 3;
        //     $operator = $wave->operator($msisdn, $country_id);
        //     if ($operator != "Telenor") {
        //         Alert::error('Operator not provide. please use telenor', 'Oops!')->persistent('Close');
        //         return redirect()->back();
        //     } else {
        //         $msisdn = $this->modify_msisdn($msisdn);
                
        //         $customer_id = $this->customer_creation($request->all());

        //         // $payment = json_decode($wave->wave_payment($msisdn, 1, "MMK"), true);
                
        //         /* For development */
        //         $payment = [];
        //         $payment['success'] = true;
        //         /* For development */

        //         if ($payment['success']) {
        //             $product_id = Session::get('product_id');
        //             $producthelper = new ProductHelper;
        //             $producthelper->decreaseproduct($product_id, 1);
        //             $this->order_creation($product_id, $customer_id);
        //             Alert::success('Successfully saved', 'Oops!')->persistent('Close');
        //             Session::put('phone', $request->phone);
        //             return redirect('/');

        //         } else {
        //             Alert::error('Unable to order this product', 'Oops!')->persistent('Close');
        //             return redirect()->back();
        //         }
        //     }
        // } else {
        //     Alert::error('Please used myanmar country operator', 'Oops!')->persistent('Close');
        //     return redirect()->back();
        // }
    }

    private function order_creation($product_id, $customer_id)
    {
        $order = new Order;
        $order->order_id = getOrderId();
        $order->product_id = $product_id;
        $order->customer_id = $customer_id;
        $order->order_status = 0;
        $order->save();
    }

    private function modify_msisdn($msisdn){
        $msisdn = ltrim($msisdn, "+9");
        $msisdn = ltrim($msisdn, "5");
        $msisdn = "0" . $msisdn;
        return $msisdn;
    }

    private function customer_creation($request) {
        $row = Customer::where('phone', $request['phone'])->first();

        if (!$row) {
            $row = new Customer;
            $row->name = $request['name'];
            $row->phone = $request['phone'];
            $row->address = $request['address'];
            $row->save();
        }

        return $row->id;
    }

    public function thanks() {
        $id = Session::get('product_id');
        $product = Product::find($id);
        return view('thanks', compact($product));
    }
}





