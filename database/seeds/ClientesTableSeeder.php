<?php

use Illuminate\Database\Seeder;
use App\Model\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente::class,2000)->create();
    }
}
