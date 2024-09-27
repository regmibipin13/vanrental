<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBookingStatusesTable extends Migration
{
    public function up()
    {
        Schema::table('booking_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->foreign('booking_id', 'booking_fk_10140495')->references('id')->on('bookings');
        });
    }
}
