<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginregisters', function (Blueprint $table) {
            $table->id();
            $table->string('new_name',50);
            $table->string('new_email',50)->unique();
            $table->string('password');
            $table->string('password_confirmation');
            $table->date('date_of_brith');
            $table->string('gender');
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
        Schema::dropIfExists('loginregisters');
    }
}
