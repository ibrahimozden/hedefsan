<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    //
    protected $table ='kurulum';
    protected $fillable= ([
        'kurulum', 'kurulum_en', 'kurulum_turu_id'
    ]);
    public $timestamps=false;
}

