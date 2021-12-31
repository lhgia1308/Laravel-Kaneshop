<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->bigInteger('seller_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('image', 30)->nullable();
            $table->string('banner', 191)->nullable();
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
        Schema::dropIfExists('shops');
    }
}
