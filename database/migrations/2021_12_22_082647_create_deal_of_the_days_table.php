<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealOfTheDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_of_the_days', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->string('title', 150)->nullable();
            $table->tinyInteger('product_id')->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->string('discount_type', 12)->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('deal_of_the_days');
    }
}
