<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsConvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_ticket_convs', function (Blueprint $table) {
            $table->integer('id')->primary();;
            $table->bigInteger('support_ticket_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->string('customer_message', 191)->nullable();
            $table->string('admin_message', 191)->nullable();
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('support_ticket_convs');
    }
}
