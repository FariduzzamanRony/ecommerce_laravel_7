<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolios', function (Blueprint $table) {
            $table->id();
            $table->string('my_name',20);
            $table->string('father_name',20);
            $table->string('mother_name',20);
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('protfolios');
    }
}
