<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSetup extends Model
{
    //
    protected $table ='urun_kurulum';
    protected $fillable= ([
        'adi', 'adi_en'
    ]);
    public $timestamps=false;
}

