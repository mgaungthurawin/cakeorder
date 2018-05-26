<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'price', 'stock', 'description', 'image',
    ];

    public function order() {
    	return $this->belongsTo('App\Admin\Order');
    }

    public function categories() 
    {
    	return $this->belongsToMany("App\Admin\Category");
    }

}
