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
        Schema::create('pagos', function (Blueprint $table) {
            /*
            id_pago int not null primary key auto_increment,
            nombre varchar(50) not null,
            total_personas int not null,
            fecha_ingreso date not null,
            valor_alq decimal(6,2) not null,
            
            deuda_inmueble decimal(6,2) not null,
            serv_luz decimal(6,2) not null,
            serv_agua decimal(6,2) not null,
            serv_extra decimal(6,2) not null,
            
            total decimal(6,2) not null,
            
            inmueble decimal(6,2) not null,
            luz decimal(6,2) not null,
            agua decimal(6,2) not null,
            extra decimal(6,2) not null,
            importe_pagado decimal(6,2) not null,
            
            mora decimal(6,2) not null,
            pago_mora decimal(6,2) not null,
            
            fecha_pago date not null,
            importe_final decimal(6,2) not null,
            pago_final decimal(6,2) not null,
            deuda_actual decimal(6,2) not null
            */
            $table->id();
            $table -> string('nombre');
            $table->integer('total_personas');
            $table->date('fecha_ingreso');
            $table->decimal('valor_alq', $precision = 8, $scale = 2);
            $table->decimal('deuda_inmueble', $precision = 8, $scale = 2);
            $table->decimal('serv_luz', $precision = 6, $scale = 2);
            $table->decimal('serv_agua', $precision = 6, $scale = 2);
            $table->decimal('serv_extra', $precision = 6, $scale = 2);
            $table->decimal('total', $precision = 6, $scale = 2);
            $table->decimal('inmueble', $precision = 6, $scale = 2);
            $table->decimal('luz', $precision = 6, $scale = 2);
            $table->decimal('agua', $precision = 6, $scale = 2);
            $table->decimal('extra', $precision = 6, $scale = 2);
            $table->decimal('importe_pagado', $precision = 6, $scale = 2);
            $table->decimal('mora', $precision = 6, $scale = 2);
            $table->decimal('pago_mora', $precision = 6, $scale = 2);
            $table->decimal('fecha_pago', $precision = 6, $scale = 2);
            $table->decimal('importe_final', $precision = 6, $scale = 2);
            $table->decimal('pago_final', $precision = 6, $scale = 2);
            $table->decimal('deuda_actual', $precision = 6, $scale = 2);
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
        Schema::dropIfExists('pagos');
    }
};
