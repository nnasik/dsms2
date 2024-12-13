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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('cs_nic');
            $table->string('cs_phone');
            $table->string('cs_name');
            $table->string('service_requested');
            $table->datetime('requested_on');
            $table->datetime('closed_on');
            $table->string('recorded_by');
            $table->string('status');
            $table->timestamps();

            $table->foreign('recorded_by')->references('nic')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_requests');
    }
};
