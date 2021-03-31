<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->integer('booking_id')->autoIncrement();
            $table->dateTime('created_at_local');
            $table->integer('driver_id')->index();
            $table->integer('passenger_id')->index();
            $table->string('state',50);
            $table->integer('country_id')->index();
            $table->decimal('fare',9,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
