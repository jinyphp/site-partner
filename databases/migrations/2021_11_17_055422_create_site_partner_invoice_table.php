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
        Schema::create('site_partner_invoice', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 파트너 타입 활성화 여부
            $table->string('enable')->nullable();

            // 파트너 타입
            $table->string('type')->nullable();
            $table->string('country')->nullable();

            $table->string('email')->nullable();
            $table->string('name')->nullable();

            $table->string('status')->nullable();
            $table->string('expire')->nullable();

            $table->string('payment')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_date')->nullable();



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
        Schema::dropIfExists('site_partner_invoice');

    }
};
