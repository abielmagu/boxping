<?php

use Illuminate\Database\Seeder;

class EtapasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(\App\Etapa::class, 10)->create();
    }
}
