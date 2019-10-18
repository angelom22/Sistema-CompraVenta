<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100);
            $table->integer('tipo_documento')->unsigned();
            $table->string('num_documento',20)->unique();
            $table->string('direccion',70)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('email',50)->nullable()->unique();
            $table->string('usuario')->unique();
            $table->string('password');
            $table->boolean('condicion')->default(1);
            $table->integer('idrol')->unsigned();
            $table->string('imagen',300)->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipo_documento')->references('id')->on('tipo_documento');
            $table->foreign('idrol')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
