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
        Schema::create('front_pages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('file_no');
            $table->string('branch');

            // Subject Files
            $table->string('heading'); 
            $table->string('sub_heading')->nullable(); 
            $table->string('year')->nullable();

            // Only Applicable for Personal File
            $table->string('name_of_the_officer')->nullable(); // Only Applicable for Personal File
            $table->string('designation')->nullable(); // Only Applicable for Personal File
            $table->date('dob')->nullable();
            $table->string('nic')->nullable();
            $table->string('date_of_appointment')->nullable();
            $table->string('appoint_letter_no')->nullable();
            $table->string('wnop_no')->nullable();
            $table->string('date_of_increment')->nullable();
            $table->date('date_of_retirement')->nullable();
            $table->string('private_address')->nullable();
            
            $table->string('user_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('front_pages');
    }
};
