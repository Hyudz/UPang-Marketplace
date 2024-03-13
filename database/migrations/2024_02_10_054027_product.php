<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('description', 1000);
                $table->string('image');
                $table->string('price');
                $table->string('availability')->default('under_review');
                $table->string('category');
                $table->string('quantity');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('user_table')->onDelete('cascade');
                $table->string('message')->nullable();
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
};
