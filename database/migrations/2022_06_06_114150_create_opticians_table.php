<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpticiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opticians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->string('zip');
            $table->string('city');
            $table->string('url_homepage')->nullable();
            $table->string('url_imprint')->nullable();
            $table->string('url_privacy')->nullable();
            $table->string('url_contact')->nullable();
            $table->string('url_appointment')->nullable();
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
        Schema::dropIfExists('opticians');
    }
}
