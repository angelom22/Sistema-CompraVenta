<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',30)->unique();
            $table->string('descripcion',100)->nullable();
            $table->boolean('condicion')->default(1);
            // $table->timestamps();
        });

        DB::table('roles')->insert(array('id'=>'1','nombre' => 'Administrador', 'descripcion' => 'Administrador del sistema'));
        DB::table('roles')->insert(array('id'=>'2','nombre' => 'Vendedor', 'descripcion' => 'Vendedor del sistema'));
        DB::table('roles')->insert(array('id'=>'3','nombre' => 'Comprador', 'descripcion' => 'Comprador del sistema'));
        DB::table('roles')->insert(array('id'=>'4','nombre' => 'Socio', 'descripcion' => 'Rol de Socio'));
        DB::table('roles')->insert(array('id'=>'5','nombre' => 'Gerente', 'descripcion' => 'Rol de gerente'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
