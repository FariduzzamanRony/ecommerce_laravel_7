<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('payment_status')->dafault('1');
            $table->float('sub_total');
            $table->integer('disscount_amunt')->dafault('0');
            $table->string('coupon_name');
            $table->float('total');
            $table->integer('payment_method');
            $table->integer('billing_id');
            $table->integer('shipping_id');
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
        Schema::dropIfExists('orders');
    }
}
