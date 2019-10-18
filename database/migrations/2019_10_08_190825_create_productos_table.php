<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_categoria')->unsigned();
            $table->string('codigo',50)->nullable()->unique();
            $table->string('nombre',150)->unique();
            $table->decimal('precio_venta',11,2);
            $table->decimal('precio_costo',11,2);
            $table->integer('stock');
            // $table->string('stock_almacen',20);
            $table->integer('alarma_stock')->nullable();
            $table->integer('oferta')->nullable();
            $table->string('cant_oferta',100)->nullable();
            $table->boolean('condicion')->default(1);
            $table->integer('medicion')->unsigned();
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('medicion')->references('id')->on('unidad_mediciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
