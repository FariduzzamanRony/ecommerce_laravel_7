<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordel_details', function (Blueprint $table) {
          $table->id();
              $table->integer('user_id');
              $table->integer('review_active')->dafault('1');
              $table->integer('payment_method');
              $table->integer('order_id');
              $table->integer('product_id');
              $table->string('product_photo');
              $table->longText('review')->nullable();
              $table->integer('star')->nullable();
              $table->longText('Admin_reply')->nullable();
              $table->integer('product_quantity');
              $table->integer('product_price');
              $table->float('totle_price');
              $table->softDeletes();
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordel_details');
    }
}
