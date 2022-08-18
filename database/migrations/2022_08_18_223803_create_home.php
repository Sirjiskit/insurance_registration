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
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('IRNO')->nullable();
            $table->integer('userId');
            $table->integer('bedRooms');
            $table->integer('baths');
            $table->string('pool')->default('No');
            $table->string('fenced')->default('No');
            $table->string('roofType');
            $table->integer('roofage');
            $table->string('floorType');
            $table->integer('garage')->default(0);
            $table->string('year');
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
        Schema::dropIfExists('home');
    }
};
