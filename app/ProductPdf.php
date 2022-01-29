<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPdf extends Model
{
    //
    protected $table ='urun_pdf';
    protected $fillable= ([
        'adi', 'adi_en'
    ]);
    public $timestamps=false;
}

