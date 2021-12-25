<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateTableAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->integer('id')->primary();
            $table->string('name', 80)->nullable();
            $table->string('phone', 25)->nullable();
            $table->tinyInteger('admin_role_id')->nullable();
            $table->string('image', 30)->nullable();
            $table->string('email', 80)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 80)->nullable();
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('admins');
    }
}
