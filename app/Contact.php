<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contact extends Model
{
   use SoftDeletes;
   protected $fillable=['contact_name','contact_email','contact_number','contact_title','contact_messages'];




}
