<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugartrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugartrabajos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->string('descripcion',150);
            $table->double('logitud',17,14);
            $table->double('latitud',17,14);
            $table->integer('radio');
            $table->time('apertura_marcado');
            $table->time('cierre_marcado');

            $table->time('inicio_desde')->nullable();
            $table->time('inicio_hasta')->nullable();
            $table->time('fin_desde')->nullable();
            $table->time('fin_hasta')->nullable();

            $table->unsignedBigInteger('horario_id');

            $table->enum('turno', ['Dia','Noche','Medio Turno','Continuo'])->default('Dia');

            $table->integer('minutos_espera');
            $table->string('dias_trabajo',50);
            $table->unsignedBigInteger('user_id');
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('lugartrabajos');
    }
}
