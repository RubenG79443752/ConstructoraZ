<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lugartrabajo_id');
            $table->date('fecha_asitencia');

            $table->time('hora_entrada');
            $table->double('long_entrada',17,14)->nullable();
            $table->double('lat_entrada',17,14)->nullable();
            $table->enum('estado_entrada', ['Correcto','Incorrecto'])->default('Correcto');

            $table->time('hora_salida');
            $table->double('long_salida',17,14)->nullable();
            $table->double('lat_salida',17,14)->nullable();
            $table->enum('estado_salida', ['Correcto','Incorrecto'])->default('Correcto');

            $table->time('tardanza')->nullable();
            $table->double('tiempo_laborado',5,1)->default(0);
            $table->enum('tipo_asistencia', ['Gps','Offline'])->default('Gps');

            $table->enum('estado_final', ['Presencia','Ausencia'])->default('Presencia');

            $table->foreign('lugartrabajo_id')->references('id')->on('lugartrabajos');
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
        Schema::dropIfExists('asistencias');
    }
}
