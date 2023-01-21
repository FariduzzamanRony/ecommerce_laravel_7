<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->id();
              $table->integer('cat_id');
              $table->string('offer_price')->nullable();
              $table->integer('sub_category_id');
              $table->string('product_name');
              $table->string('product_title');
              $table->longText('product_description');
              $table->longText('product_long_description');
              $table->float('product_price');
              $table->integer('product_quantity');
              $table->integer('alert_quantity');
              $table->string('product_thumbnail_photo')->default('null.png');
              $table->longText('slug');
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
        Schema::dropIfExists('products');
    }
}
