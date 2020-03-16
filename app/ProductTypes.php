<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTypes extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
         'types' , 'sort'
    ];

    public function products(){
        return $this->hasMany('App\Products')->orderby('sort' , 'desc');
}
}
