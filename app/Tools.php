<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    protected $fillable = [
        'tl_name', 'tl_desc', 'color'
    ];
}
