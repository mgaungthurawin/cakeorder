<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Helper\ProductHelper;
use Konekt\PdfInvoice\InvoicePrinter;
use App\Customer;
use App\Admin\Order;
use App\Admin\Product;
use Alert;
use Session;

class CartController extends Controller
{
    public function postCart(Request $request) {
        $product_id = $request->product_id;
        $prod = Product::where('id', $product_id)->first();
        $producthelper = new ProductHelper;
    	Cart::add([
    	  ['id' => $prod->id, 'name' => $prod->title, 'qty' => 1, 'price' => $prod->price]
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


    public function cartOrder() {
        $carts = Cart::content();
        return view('cartorder');
    }

    public function postCartOrder(Request $request) {
        
        $location = strtoupper($request->location);
        $locationArr = config('location.price');
        $delivery = $locationArr[$location];
        
        $customer_id = $this->customer_creation($request->all());
        $order_id = getOrderId();
        $producthelper = new ProductHelper;
        $carts = Cart::content();
        $total = 0;
        foreach ($carts as $key => $cart) {
            $this->order_creation($cart->id, $customer_id, $order_id);
            $producthelper->decreaseproduct($cart->id, $cart->quantity);
            $total += $cart->subtotal;
        }
        Alert::success('Successfully saved', 'Oops!')->persistent('Close');
        Session::put('phone', $request->phone);
    
        Session::put('phone', $request->phone);
        // return redirect('/');

        $invoice = new InvoicePrinter("A4", "Ks"); 

        /* Header settings */
        $invoice->setLogo(public_path("images/invoice.png"));   //logo image path
        $invoice->setColor("#007fff");      // pdf color scheme
        $invoice->setType("Order Invoice");    // Invoice Type
        $invoice->setReference("INV-".$order_id);   // Reference
        $invoice->setDate(date('M - d - Y',time()));   //Billing Date
        $invoice->setTime(date('h:i:s A',time()));   //Billing Time
        // $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
        $invoice->setFrom(array($request->name,$request->phone,$request->address,""));
        $invoice->setTo(array("Nyo Lay Htike","Online Cake Order","128 AA Juanita Ave","Glendora , CA 91740"));
        foreach ($carts as $key => $cart) {
            $invoice->addItem($cart->name,"",$cart->qty,0,$cart->price,0,$cart->subtotal);
            Cart::remove($cart->rowId);
        }
        $total += $delivery;
        $invoice->addTotal("Total",$total);
        $invoice->addTotal("Total due",$total,true);
         
        $invoice->addBadge("Ordered");

        $invoice->addTitle("Please download and save before you got the products");
         
        $invoice->setFooternote("Online Cake Order");
         
        $invoice->render($order_id .'.pdf','I');
    }

    public function cartdelivery($location) {
        $location = strtoupper($location);
        $locationArr = config('location.price');
        return $locationArr[$location];
    }

    private function customer_creation($request) {
        $row = Customer::where('phone', $request['phone'])->first();

        if (!$row) {
            $row = new Customer;
            $row->name = $request['name'];
            $row->phone = $request['phone'];
            $row->location = $request['location'];
            $row->address = $request['address'];
            $row->save();
        }

        return $row->id;
    }

    private function order_creation($product_id, $customer_id, $order_id)
    {
        $order = new Order;
        $order->order_id = $order_id;
        $order->product_id = $product_id;
        $order->customer_id = $customer_id;
        $order->order_status = 0;
        $order->save();
    }

}






