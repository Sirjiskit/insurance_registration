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
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('IRNO')->nullable();
            $table->string('name');
            $table->tinyText('description');
            $table->tinyText('businessAddress');
            $table->string('businessState');
            $table->string('businessCity');
            $table->tinyText('services');
            $table->string('payroll');
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
        Schema::dropIfExists('business');
    }
};
