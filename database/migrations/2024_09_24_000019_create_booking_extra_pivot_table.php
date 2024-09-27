<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingExtraPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_extra', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_10140478')->references('id')->on('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('extra_id');
            $table->foreign('extra_id', 'extra_id_fk_10140478')->references('id')->on('extras')->onDelete('cascade');
        });
    }
}
