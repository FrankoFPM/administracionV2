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
        Schema::create('inclino', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            $table->integer('piso');
            $table->decimal('valor_alq', $precision = 8, $scale = 2);
            $table->integer('total_personas');
            $table->date('fecha_ingreso');
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
        Schema::dropIfExists('inclino');
    }
};
