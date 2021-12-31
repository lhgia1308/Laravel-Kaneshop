<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('mobile_number', 191)->nullable();
            $table->string('subject', 191)->nullable();
            $table->text('message')->nullable();
            $table->tinyInteger('seen')->nullable();
            $table->string('feedback', 191)->nullable();
            $table->longText('reply')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
