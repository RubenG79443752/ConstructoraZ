<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->string('mes',8);
            $table->string('anio',4);
            $table->string('horas_pagadas',3);
            $table->string('dias_pagados',3);
            $table->double('haber_basico',8,2);
            $table->double('bono_antiguedad',8,2);
            $table->double('trabajo_extra_nocturno',8,2);
            $table->double('total_ganado',8,2);
            $table->double('afps',8,2);
            $table->double('rc_iva',8,2);
            $table->double('otros_descuentos',8,2);
            $table->double('total_descuentos',8,2);
            $table->double('liquido_pagable',8,2);
            $table->unsignedBigInteger('personal_id');
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->foreign('personal_id')->references('id')->on('personals');
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
        Schema::dropIfExists('planillas');
    }
}
