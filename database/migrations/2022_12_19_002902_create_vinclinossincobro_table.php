<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
        $view_query = "create view vInclinosSinCobro as select i.* from inclino i WHERE id NOT IN (SELECT id_arrendatario FROM cobro);";
        DB::statement($view_query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW vInclinosSinCobro");
    }
};
