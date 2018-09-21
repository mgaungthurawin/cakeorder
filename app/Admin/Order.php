<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id','product_id', 'customer_id', 'order_status', 'cake_text', 'order_date', 'delivery_date',
    ];

    public function product() {
    	return $this->hasOne('App\Admin\Product');
    }

    public function customer() {
    	return $this->hasOne('App\Customer');
    }
}
