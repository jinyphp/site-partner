<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_partner', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('enable')->nullable();

            // 파트너 타입
            $table->string('type')->nullable();
            $table->string('country')->nullable();

            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();

            $table->string('position')->nullable(); // 직위 및 직책
            $table->string('skill')->nullable();
            $table->string('career')->nullable(); // 경력

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('description')->nullable();

            $table->string('star')->nullable();
            $table->string('like')->nullable();
            $table->string('reviews')->nullable();
            $table->string('customers')->nullable();

            $table->string('price_time')->nullable();
            $table->string('price_day')->nullable();
            $table->string('price_month')->nullable();
            $table->string('price_year')->nullable();

            $table->string('status')->nullable();
            $table->string('expire')->nullable();

            $table->string('manager')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_partner');

    }
};
