<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone', 'address'
    ];

    public function order() {
    	return $this->belongsTo('App\Admin\Order');
    }
}
