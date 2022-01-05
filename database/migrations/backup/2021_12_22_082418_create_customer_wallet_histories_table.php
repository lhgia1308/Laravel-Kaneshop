<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerWalletHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_wallet_histories', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->tinyInteger('customer_id')->nullable();
            $table->decimal('transaction_amount', 8, 2)->nullable();
            $table->string('transaction_type', 20)->nullable();
            $table->string('transaction_method', 30)->nullable();
            $table->string('transaction_id', 20)->nullable();
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
        Schema::dropIfExists('customer_wallet_histories');
    }
}