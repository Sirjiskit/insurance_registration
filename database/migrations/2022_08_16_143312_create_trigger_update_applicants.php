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
        DB::unprepared("CREATE TRIGGER copy_to_applicants AFTER INSERT ON `users` FOR EACH ROW
        BEGIN
            INSERT INTO applicants (`userId`, `created_at`, `updated_at`) 
            VALUES (NEW.id, now(), null);
        END");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `copy_to_applicants`');
    }
};
