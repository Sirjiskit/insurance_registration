<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('IRNO')->nullable();
            $table->integer('userId');
            $table->string('plateNo');
            $table->string('chasisNo');
            $table->string('make');
            $table->string('model');
            $table->string('engineNo');
            $table->string('category');
            $table->string('bodyType');
            $table->string('mileage');
            $table->string('color');
            $table->string('value');
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('cars');
    }
};
