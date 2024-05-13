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
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->date('event_date');
            $table->string('name_of_event');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('participations');
            $table->text('note');
            $table->string('reserver');
            $table->string('status')->default('Requested');
            $table->dateTime('requested_on');
            $table->dateTime('approved_on')->nullable();
            $table->string('approved_by')->nullable();
            
            $table->timestamps();

            $table->foreign('reserver')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
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
