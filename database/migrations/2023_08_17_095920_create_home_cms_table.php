<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_cms', function (Blueprint $table) {
            $table->id();
            $table->string('banner1_image')->nullable();
            $table->string('banner1_title')->nullable();
            $table->string('banner1_subtitle')->nullable();
            $table->string('banner2_image')->nullable();
            $table->string('banner2_title')->nullable();
            $table->string('banner2_subtitle')->nullable();
            $table->string('banner3_image')->nullable();
            $table->string('banner3_title')->nullable();
            $table->string('banner3_subtitle')->nullable();
            $table->string('body_title')->nullable();
            $table->longText('body_section')->nullable();
            $table->string('footer_section')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_cms');
    }
}
