<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->text('product_details')->nullable();
            $table->integer('qty')->nullable();
            $table->double('price', 15, 8)->nullable();
            $table->double('tax', 15, 8)->nullable();
            $table->double('discount', 15, 8)->nullable();
            $table->string('delivery_status', 15)->nullable();
            $table->string('payment_status', 15)->nullable();
            $table->bigInteger('shipping_method_id')->nullable();
            $table->string('variant', 255)->nullable();
            $table->string('variation', 255)->nullable();
            $table->string('discount_type', 30)->nullable();
            $table->tinyInteger('is_stock_decreased')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
