<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('added_by', 191)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('name', 80)->nullable();
            $table->string('slug', 120)->nullable();
            $table->string('category_ids', 255)->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('unit', 191)->nullable();
            $table->integer('min_qty')->nullable();
            $table->tinyInteger('refundable')->nullable();
            $table->string('images', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('featured', 255)->nullable();
            $table->string('flash_deal', 255)->nullable();
            $table->string('video_provider', 30)->nullable();
            $table->string('video_url', 150)->nullable();
            $table->string('colors', 150)->nullable();
            $table->tinyInteger('variant_product')->nullable();
            $table->string('attributes', 255)->nullable();
            $table->text('choice_options')->nullable();
            $table->text('variation')->nullable();
            $table->tinyInteger('published')->nullable();
            $table->double('unit_price', 15, 8)->nullable();
            $table->double('purchase_price', 15, 8)->nullable();
            $table->string('tax', 191)->nullable();
            $table->string('tax_type', 80)->nullable();
            $table->string('discount', 191)->nullable();
            $table->string('discount_type', 80)->nullable();
            $table->integer('current_stock')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('free_shipping')->nullable();
            $table->string('attachment', 191)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('featured_status')->nullable();
            $table->string('meta_title', 191)->nullable();
            $table->string('meta_description', 191)->nullable();
            $table->string('meta_image', 191)->nullable();
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
        Schema::dropIfExists('products');
    }
}
