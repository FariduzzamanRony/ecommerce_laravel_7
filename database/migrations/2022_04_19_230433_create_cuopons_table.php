<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuoponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuopons', function (Blueprint $table) {
           $table->id();
           $table->string('coupon_name')->unique();
           $table->integer('added_by');
           $table->integer('discount_amount');
           $table->integer('minimun_amount');
           $table->date('validity_till');
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
        Schema::dropIfExists('cuopons');
    }
}
