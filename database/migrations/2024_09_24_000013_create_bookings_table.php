<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pickup_location')->nullable();
            $table->string('drop_location')->nullable();
            $table->datetime('pickup_date')->nullable();
            $table->datetime('drop_date');
            $table->float('total_booking_amount', 12, 2);
            $table->timestamps();
        });
    }
}
