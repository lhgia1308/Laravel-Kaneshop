<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChattingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chattings', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('seller_id')->nullable();
            $table->text('message')->nullable();
            $table->tinyInteger('sent_by_customer')->nullable();
            $table->tinyInteger('sent_by_seller')->nullable();
            $table->tinyInteger('seen_by_customer')->nullable();
            $table->tinyInteger('seen_by_seller')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('shop_id')->nullable();
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
        Schema::dropIfExists('chattings');
    }
}
