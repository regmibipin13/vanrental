<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityVanPivotTable extends Migration
{
    public function up()
    {
        Schema::create('facility_van', function (Blueprint $table) {
            $table->unsignedBigInteger('van_id');
            $table->foreign('van_id', 'van_id_fk_10141654')->references('id')->on('vans')->onDelete('cascade');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id', 'facility_id_fk_10141654')->references('id')->on('facilities')->onDelete('cascade');
        });
    }
}
