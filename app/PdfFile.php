<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    //
    protected $table ='pdf_file';
    protected $fillable= ([
        'name', 'name_en', 'pdf_url', 'pdf_url_en', 'urun_pdf_id'
    ]);
    public $timestamps=false;
}

