<?php

use Illuminate\Database\Seeder;

class BookingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Model\Booking::class,100)->create();
    }
}
