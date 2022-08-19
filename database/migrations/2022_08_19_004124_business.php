<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared("
        CREATE TRIGGER `getBusinessIRNO`
        BEFORE INSERT ON `business` FOR EACH ROW 
        BEGIN
            declare ready int default 0;
            declare rnd_str text;
            if new.IRNO is null then
                while not ready do
                    set rnd_str := lpad(conv(floor(rand()*pow(36,8)), 10, 36), 8, 0);
                    if not exists (select * from business where IRNO = rnd_str) then
                        set new.IRNO = rnd_str;
                        set ready := 1;
                    end if;
                end while;
            end if;
        END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS getBusinessIRNO');
    }
};
