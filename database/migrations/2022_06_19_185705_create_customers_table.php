<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->foreignId('customer_list_id')->constrained('customer_lists')->cascadeOnDelete();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('street');
            $table->string('postal');
            $table->string('city');
            $table->string('country');
            $table->string('firm');
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
        Schema::dropIfExists('customers');
    }
}
