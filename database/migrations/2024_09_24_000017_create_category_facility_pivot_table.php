<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFacilityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_facility', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_10140835')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id', 'facility_id_fk_10140835')->references('id')->on('facilities')->onDelete('cascade');
        });
    }
}
