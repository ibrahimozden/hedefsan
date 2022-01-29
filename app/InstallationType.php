<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstallationType extends Model
{
    //
    protected $table ='kurulum_turu';
    protected $fillable= ([
        'tur', 'tur_en', 'kurulum_urun_id'
    ]);
    public $timestamps=false;
}

