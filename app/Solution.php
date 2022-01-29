<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    //
    protected $table ='cozum';
    protected $fillable= ([
        'cozum_text', 'cozum_text_en', 'hata_id'
    ]);
    public $timestamps=false;
    
}

