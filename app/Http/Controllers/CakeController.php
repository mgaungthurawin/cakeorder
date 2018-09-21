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
use Konekt\PdfInvoice\InvoicePrinter;

class CakeController extends Controller
{
    public function cakedetail($id) {
    	$product = Product::find($id);
        $products = Product::where('title', $product->title)->select('id', 'weigh')->get();
        Session::put('product_id', $product->id);
    	if (empty($product)) {
            alert()->error('product no found', 'OOh..')->persistent("Close");
            return redirect()->back();
    	}

        Session::put('product_id', $product->id);
    	return view('cakedetail', compact('product', 'products'));
    }


    public function order(){
        $product_id = Session::get('product_id');
        $product = Product::find($product_id);
        $products = Product::where('title', $product->title)->select('id', 'weigh')->get();
        return view('order', compact('product', 'products'));
    }

    public function postOrder(Request $request) {
        $location = strtoupper($request->location);
        $locationArr = config('location.price');
        $delivery = $locationArr[$location];
        $delivery = $delivery ;
        $delivery_date = $request->delivery_date . ' ' . date('H:i:s');

        $customer_id = $this->customer_creation($request->all());
        $product_id = Session::get('product_id');
        $product = Product::find($product_id);
        $total = $product->price * $request->quantity + $delivery;

        if ($product->stock < $request->quantity) {
            Alert::error('Cake not has ' . $request->quantity . '. Only Have ' .$product->stock, 'Oops!')->persistent('Close');
            return redirect()->back();
        }
        $order_id = getOrderId();

        $producthelper = new ProductHelper;
        $producthelper->decreaseproduct($product_id, $request->quantity);
        $this->order_creation($product_id, $customer_id, $order_id, $request->text, $delivery_date);
        Alert::success('Successfully saved', 'Oops!')->persistent('Close');
        Session::put('phone', $request->phone);
        // return redirect('/');

        // $invoice = new InvoicePrinter();
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
        $invoice->setTo(array("Nyo Lay Htike","Online Cake Order","No (7) Ahwaiyer st","8 ward , Kamayut Township"));
        $invoice->addItem($product->title,"",$request->quantity,$delivery,$product->price,0,$total);
         
        $invoice->addTotal("Total",$total);
        $invoice->addTotal("Total due",$total,true);
         
        $invoice->addBadge("Ordered");

        $invoice->addTitle("Please download and save before you got the products");
         
        $invoice->setFooternote("Online Cake Order");
         
        $invoice->render($order_id .'.pdf','I'); 

    }

    private function order_creation($product_id, $customer_id, $order_id, $text, $delivery)
    {
        $order_date = date('Y-m-d H:i:s');
        $order = new Order;
        $order->order_id = $order_id;
        $order->product_id = $product_id;
        $order->customer_id = $customer_id;
        $order->order_status = 0;
        $order->cake_text = $text;
        $order->order_date = $order_date;
        $order->delivery_date = $delivery;
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

        // if (!$row) {
            $row = new Customer;
            $row->name = $request['name'];
            $row->phone = $request['phone'];
            $row->location = $request['location'];
            $row->address = $request['address'];
            $row->save();
        // }

        return $row->id;
    }

    public function thanks() {
        $id = Session::get('product_id');
        $product = Product::find($id);
        return view('thanks', compact($product));
    }

    public function getprice($id) {
        $product = Product::find($id);
        Session::put('product_id', $id);
        return $product;
    }

    public function getdelivery($location) {
        $location = strtoupper($location);
        $locationArr = config('location.price');
        return $locationArr[$location];
    }

}





