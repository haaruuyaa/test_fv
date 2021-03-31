<?php

use Illuminate\Database\Seeder;

class DriverSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Model\Drivers::class,20)->create();
    }
}
