<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   protected $fillable=['blog_name','blog_email','blog_photo'];
}
