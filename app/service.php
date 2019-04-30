<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public $timestamp = false;
    protected $fillable =[
      'subject',
      'email',
      'status',
      'description',
      'created_at',
      'updated_at'
    ];
}
