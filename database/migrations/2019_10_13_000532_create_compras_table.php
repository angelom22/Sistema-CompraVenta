<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idproveedor')->unsigned();
            $table->integer('idusuario')->unsigned();
            $table->string('tipo_identificacion',20);
            $table->string('num_compra',10);
            $table->dateTime('fecha_compra');
            $table->decimal('impuesto',4,2);
            $table->decimal('total',11,2);
            $table->string('estado',20);
            $table->timestamps();
            
            $table->foreign('idproveedor')->references('id')->on('proveedores');
            $table->foreign('idusuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
