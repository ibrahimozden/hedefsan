<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    //
    protected $table ='hata';
    protected $fillable= ([
        'hata_kodu', 'hata_kodu_en', 'urun_id'
    ]);
    public $timestamps=false;
}

