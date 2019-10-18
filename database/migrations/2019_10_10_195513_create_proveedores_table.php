<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_empresa',100)->unique();
            $table->string('responsable',100)->nullable();
            $table->integer('tipo_documento')->unsigned();
            $table->string('num_documento',20)->unique();
            $table->string('direccion',70)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('email',50)->nullable()->unique();
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('tipo_documento')->references('id')->on('tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
