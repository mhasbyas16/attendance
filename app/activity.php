<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    public $timestamp = false;
    protected $fillable =[
      'id','date','intime','locin','outtime','locout','subject','description','pict'
    ];
}
