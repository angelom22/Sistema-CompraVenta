<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pago', function (Blueprint $table) {
            $table->bigIncrements('id_pago');
            $table->string('nombre')->unique();
            $table->string('detalle',150)->nullable();
            $table->decimal('cantidad', 65, 2);
            // $table->timestamps();
        });

        DB::table('tipo_pago')->insert(array('id_pago'=>'1','nombre' => 'Punto'));
        DB::table('tipo_pago')->insert(array('id_pago'=>'2','nombre' => 'Efectivo'));
        DB::table('tipo_pago')->insert(array('id_pago'=>'3','nombre' => 'Moneda extranjera'));
        DB::table('tipo_pago')->insert(array('id_pago'=>'4','nombre' => 'Transferencia'));
        DB::table('tipo_pago')->insert(array('id_pago'=>'5','nombre' => 'CriptoMoneda'));
        DB::table('tipo_pago')->insert(array('id_pago'=>'6','nombre' => 'Nota de Credito'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_pago');
    }
}
