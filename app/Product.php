<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table ='urun';
    protected $fillable= ([
        'adi', 'adi_en'
    ]);
    public $timestamps=false;
}

