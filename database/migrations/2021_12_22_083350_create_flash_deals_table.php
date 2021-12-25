<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_deals', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->string('title', 150)->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->string('background_color', 255)->nullable();
            $table->string('text_color', 255)->nullable();
            $table->string('banner', 100)->nullable();
            $table->string('slug', 255)->nullable();
            $table->tinyInteger('product_id')->nullable();
            $table->string('deal_type', 191)->nullable();
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
        Schema::dropIfExists('flash_deals');
    }
}
