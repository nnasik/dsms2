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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('inward_mode');
            $table->string('inward_register_reference');

            $table->date('date_in_letter');
            $table->date('date_of_receipt');
            $table->date('expected_date_of_reply');

            $table->string('from_whom');
            $table->string('letter_no');
            $table->mediumText('subject');

            $table->string('user_id');
            $table->string('status');

            $table->string('document_1')->nullable();
            $table->string('document_2')->nullable();
            $table->string('document_3')->nullable();

            $table->string('assigned_to')->nullable();
            $table->datetime('assigned_on')->nullable();
            $table->string('outward_mode')->nullable();
            $table->string('outward_register_reference')->nullable();

            $table->string('file_no')->nullable();
            $table->date('replied_date')->nullable();

            $table->string('reply_document_1')->nullable();
            $table->string('reply_document_2')->nullable();
            $table->string('reply_document_3')->nullable();
            
            $table->timestamps();
        });

        Schema::table('mails', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('assigned_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
};
