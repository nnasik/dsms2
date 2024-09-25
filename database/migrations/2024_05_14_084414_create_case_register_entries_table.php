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
        Schema::create('case_register_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('front_page_id');

            $table->string('incoming_type');
            $table->date('incoming_date');
            $table->string('incoming_from')->nullable();
            $table->string('incoming_from_custom')->nullable();
            $table->string('owner')->nullable();

            $table->string('outgoing_type')->nullable();
            $table->date('outgoing_date')->nullable();
            $table->string('outgoing_to')->nullable();
            $table->string('outgoing_to_custom')->nullable();

            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('front_page_id')->references('id')->on('front_pages');
            $table->foreign('incoming_from')->references('id')->on('users');
            $table->foreign('owner')->references('id')->on('users');
            $table->foreign('outgoing_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_register_entries');
    }
};
