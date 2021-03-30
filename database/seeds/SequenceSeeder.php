<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sequence')->insert([
            'table_name' => 'items',
            'prefix' => 'AB',
            'last_id' => 0,
            'postfix_length' => 4
        ]);
    }
}
