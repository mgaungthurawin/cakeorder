<?php
use App\Admin\Order;

function getOrderId() {
	return rand(10,99).time();
}


function order_creation($product_id, $customer_id, $order_id, $text, $delivery)
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