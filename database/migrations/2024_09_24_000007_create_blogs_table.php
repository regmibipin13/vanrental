<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->nullable();
            $table->longText('short_description');
            $table->longText('description');
            $table->boolean('is_published')->default(0)->nullable();
            $table->date('published_date');
            $table->timestamps();
        });
    }
}
