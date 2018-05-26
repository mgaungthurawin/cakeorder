<?php

namespace App\Helper;

use App;
use App\Admin\Product;

class ProductHelper 
{

    public function decreaseproduct($id, $qty)
    {
        $row = Product::find($id);
        if ($row->stock > 0) {
            $row->stock = $row->stock - $qty;
            $row->save();
            return true;
        }

        return false;
    }

    public function increaseproduct($id, $stock) {
        $row = Product::find($id);
        $row->stock = $row->stock + $stock;
        $row->save();
    }

    public function response($status, $msg) {
        $response = [];
        $response['status'] = $status;
        $response['message'] = $msg;
        return $response;
    }

}