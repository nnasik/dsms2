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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            
            $table->string('resource');
            $table->datetime('from');
            $table->datetime('to');
            $table->mediumText('event');

            $table->string('reserver');
            $table->datetime('request_on');

            $table->string('approved_by')->nullable();
            $table->datetime('approved_on')->nullable();

            $table->string('status');
            $table->mediumText('note')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
