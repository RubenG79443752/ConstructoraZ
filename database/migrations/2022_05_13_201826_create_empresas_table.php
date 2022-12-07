<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('razon_social',150);
            $table->string('n_nit',20);
            $table->string('n_identificador',15);
            $table->string('n_empleador_caja',15);
            $table->string('nim',15);
            $table->string('repre_legal',150);
            $table->string('ci_repre_legal',15);
            $table->string('direccion',150);
            $table->string('telefono',15);
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
        Schema::dropIfExists('empresas');
    }
}
