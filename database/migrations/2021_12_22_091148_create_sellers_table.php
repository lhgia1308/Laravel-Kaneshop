<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->string('f_name', 30)->nullable();
            $table->string('l_name', 30)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('image', 30)->nullable();
            $table->string('email', 80)->nullable();
            $table->string('password', 80)->nullable();
            $table->string('status', 15)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('bank_name', 191)->nullable();
            $table->string('branch', 191)->nullable();
            $table->string('account_no', 191)->nullable();
            $table->string('holder_name', 191)->nullable();
            $table->text('auth_token')->nullable();
            $table->double('sales_commission_percentage', 8, 2)->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
