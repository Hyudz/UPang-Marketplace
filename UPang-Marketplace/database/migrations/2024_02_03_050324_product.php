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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_price');
            $table->string('product_quantity');
            $table->string('product_category');
            $table->string('product_image')->default(asset('products/default.png'));
            $table->string('seller_id')->default('0');
            $table->string('approved')->default('Pending Approval');
            $table->string('product_likes')->default('0');
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
        //
    }
};
