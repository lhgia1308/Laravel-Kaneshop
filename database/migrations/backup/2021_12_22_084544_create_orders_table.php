<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->string('customer_id', 15)->nullable();
            $table->string('customer_type', 10)->nullable();
            $table->string('payment_status', 15)->nullable();
            $table->string('order_status', 15)->nullable();
            $table->string('payment_method', 30)->nullable();
            $table->string('transaction_ref', 30)->nullable();
            $table->double('order_amount', 15, 8)->nullable();
            $table->text('shipping_address')->nullable();
            $table->double('discount_amount', 15, 8)->nullable();
            $table->string('discount_type', 30)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
