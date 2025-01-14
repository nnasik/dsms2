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
            $table->unsignedBigInteger('service_requested');
            $table->datetime('opened_on');
            $table->string('opened_by');
            $table->datetime('closed_on')->nullable();
            $table->string('closed_by')->nullable();
            $table->string('status')->nullable();
            
            $table->timestamps();

            $table->foreign('service_requested')->references('id')->on('services');
            $table->foreign('opened_by')->references('id')->on('users');
            $table->foreign('closed_by')->references('id')->on('users');
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
