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
        Schema::create('cobro', function (Blueprint $table) {
            /*
            id_cobro int not null primary key auto_increment,
            id_arrendatario int not null,
            deuda_inmueble decimal(6,2) not null,
            serv_luz decimal(6,2) not null,
            serv_agua decimal(6,2) not null,
            serv_extra decimal(6,2) not null,
            total decimal(6,2) not null,

            foreign key fk_id_arrendatario(id_arrendatario)
            references inclino(id) ON DELETE CASCADE
            */
            $table->id();
            $table->decimal('deuda_inmueble', $precision = 6, $scale = 2);
            $table->decimal('serv_luz', $precision = 6, $scale = 2);
            $table->decimal('serv_agua', $precision = 6, $scale = 2);
            $table->decimal('serv_extra', $precision = 6, $scale = 2);
            $table->decimal('total', $precision = 6, $scale = 2);
            $table->foreignId('id_arrendatario')
                  ->references('id')
                  ->on('inclino')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('cobro');
    }
};
