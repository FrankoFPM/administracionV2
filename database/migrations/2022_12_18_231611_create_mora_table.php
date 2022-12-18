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
        Schema::create('mora', function (Blueprint $table) {
            /*
            id_mora int not null primary key auto_increment,
            id_usuario int not null,
            total_mora decimal(6,2) null,

            foreign key fk_id_usuario(id_usuario)
            references inclino(id) ON DELETE CASCADE
            */
            $table->id();
            $table->decimal('total_mora', $precision = 6, $scale = 2);
            $table->foreignId('id_usuario')
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
        Schema::dropIfExists('mora');
    }
};
