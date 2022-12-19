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
        $view_query = "create view vdeuda as select i.nombre as 'NOMBRE', c.total as 'TOTAL' from cobro c inner join inclino i on c.id_arrendatario = i.id;";
        DB::statement($view_query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW vdeuda");
    }
};
