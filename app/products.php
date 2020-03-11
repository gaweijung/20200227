<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'img', 'title', 'content', 'sort', 'types_id'
    ];
}
