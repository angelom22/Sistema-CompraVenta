<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuesto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->decimal('impuesto', 4, 2);

            // $table->timestamps();
        });

        DB::table('impuesto')->insert(array('id'=>'1','nombre' => 'IVA-12%','impuesto' => '12.00'));
        DB::table('impuesto')->insert(array('id'=>'2','nombre' => 'IVA-16%','impuesto' => '16.00'));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuesto');
    }
}
