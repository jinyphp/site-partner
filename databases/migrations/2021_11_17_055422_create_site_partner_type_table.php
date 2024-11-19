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
        Schema::create('site_partner_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 파트너 타입 활성화 여부
            $table->string('enable')->nullable();

            // 파트너 타입
            $table->string('type')->nullable();
            $table->string('country')->nullable();

            // 파트너 타입 이미지
            $table->string('image')->nullable();
            $table->string('name')->nullable();

            // 파트너 타입 설명
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('description')->nullable();

            // 파트너 유지 조건
            // 가격 정보
            $table->string('price_month')->nullable();
            $table->string('price_year')->nullable();

            // 파트너 수익 정보
            $table->string('margin')->nullable();
            $table->string('discount')->nullable();
            $table->string('point')->nullable();

            // 파트너 등급 정보
            $table->string('lavel')->nullable();
            $table->string('rank')->nullable();
            $table->string('customers')->nullable();

            // 파트너 관리자
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
        Schema::dropIfExists('site_partner_type');
    }
};
