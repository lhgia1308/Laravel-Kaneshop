<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->string('coupon_type', 50)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('code', 15)->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('expire_date')->nullable();
            $table->decimal('min_purchase', 8, 2)->nullable();
            $table->decimal('max_discount', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->string('discount_type', 15)->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
