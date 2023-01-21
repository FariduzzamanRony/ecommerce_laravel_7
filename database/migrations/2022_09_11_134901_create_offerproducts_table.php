<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerproducts', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          $table->integer('product_id_offer');
          $table->string('slug')->nullable();
           $table->integer('disscount');
           $table->date('validity_date');
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
        Schema::dropIfExists('offerproducts');
    }
}
