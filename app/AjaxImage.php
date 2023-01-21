<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AjaxImage extends Model
{
   protected $fillable=['title','image'];

   use SoftDeletes;
}
