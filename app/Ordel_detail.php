<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\SoftDeletes;

  class Ordel_detail extends Model
  {
     protected $fillable=['star','review','Admin_reply','payment_method','review_active'];
     use SoftDeletes;

     function product(){
      return $this->belongTo('App\Product');
     }

  }
