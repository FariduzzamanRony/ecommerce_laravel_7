<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contact_dev extends Model
{
   use SoftDeletes;
      protected $fillable=['contact_file'];
}
