<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadMedicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_mediciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('letra')->unique();
            $table->decimal('cantidad',11,2)->defautl(0);
            $table->string('descripcion')->nullable();
            // $table->timestamps();
            
        });
        
        DB::table('unidad_mediciones')->insert(array('id'=>'1','nombre' => 'Unidad','letra' => 'U', 'descripcion' => 'productos medidos por unidad'));
        DB::table('unidad_mediciones')->insert(array('id'=>'2','nombre' => 'mililitros','letra' => 'ml', 'descripcion' => 'productos medidos en mililitros'));
        DB::table('unidad_mediciones')->insert(array('id'=>'3','nombre' => 'Gramos','letra' => 'Gr', 'descripcion' => 'productos medidos por Gramos'));
        DB::table('unidad_mediciones')->insert(array('id'=>'4','nombre' => 'Kilos', 'letra' => 'Kg','descripcion' => 'productos medidos por Kilos'));
        DB::table('unidad_mediciones')->insert(array('id'=>'5','nombre' => 'Metros','letra' => 'Mtr', 'descripcion' => 'productos medidos por metros'));
        DB::table('unidad_mediciones')->insert(array('id'=>'6','nombre' => 'Litros','letra' => 'L', 'descripcion' => 'productos medidos en litros'));
        DB::table('unidad_mediciones')->insert(array('id'=>'7','nombre' => 'Paquete','letra' => 'Pqts', 'descripcion' => 'productos medidos por paquetes'));
        DB::table('unidad_mediciones')->insert(array('id'=>'8','nombre' => 'Otros','letra' => 'Otros', 'descripcion' => 'productos medidos otros'));





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_mediciones');
    }
}
