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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->string('assigned');
            $table->string('category');
            $table->mediumText('heading');
            $table->longText('body');
            $table->datetime('opened_on');
            $table->datetime('screenshot_1');
            $table->datetime('screenshot_2');
            $table->datetime('screenshot_3');
            $table->datetime('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.lllllllddd
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
