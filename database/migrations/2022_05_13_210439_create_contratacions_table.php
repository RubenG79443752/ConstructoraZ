<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->string('contrato');
            $table->string('referencia_contrato',30);
            $table->date('fecha_ingreso');
            $table->double('sueldo_inicial',10,2);
            $table->string('garantia');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('contratacions');
    }
}
