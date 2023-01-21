<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_devs', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_subject');
            $table->longText('contact_messages');
            $table->string('contact_file')->nullable();
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
        Schema::dropIfExists('contact_devs');
    }
}
