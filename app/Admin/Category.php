<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent',
    ];

    public function categoryId($query,$id) {
        return $query->where('id', '=', $id);
    }

    public function products() 
	{
       	return $this->belongsToMany("App\Admin\Product");
    }

}
