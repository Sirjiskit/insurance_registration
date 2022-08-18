<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER `user_fullname` BEFORE INSERT ON users 
        FOR EACH ROW Set NEW.fullname = CONCAT(NEW.firstName, ' ', NEW.lastName);");
       }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `user_fullname`');
    }
};
