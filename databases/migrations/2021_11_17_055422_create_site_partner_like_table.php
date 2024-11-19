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
        Schema::create('site_partner_like', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('partner_id')->nullable();
            $table->string('partner_name')->nullable();

            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();

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
        Schema::dropIfExists('site_partner_like');

    }
};
