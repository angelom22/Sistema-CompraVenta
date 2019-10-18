<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('letra_documento')->unique();
            $table->string('descripcion')->nullable();
            // $table->timestamps();
            
            $table->foreign('id')->references('tipo_documento')->on('proveedores');
            $table->foreign('id')->references('tipo_documento')->on('clientes');
        });

        DB::table('tipo_documento')->insert(array('id'=>'1','letra_documento' => 'V', 'descripcion' => 'Cédula'));
        DB::table('tipo_documento')->insert(array('id'=>'2','letra_documento' => 'E', 'descripcion' => 'Extranjero'));
        DB::table('tipo_documento')->insert(array('id'=>'3','letra_documento' => 'RIF', 'descripcion' => 'Registro de Información Fiscal'));
        DB::table('tipo_documento')->insert(array('id'=>'4','letra_documento' => 'DNI', 'descripcion' => 'Documento Nacional de Identidad'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documento');
    }
}
