<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Practice extends Model
{
   use SoftDeletes;
   protected $fillable=['status','name','email','active_status'];

}
