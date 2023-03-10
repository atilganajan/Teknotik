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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->unsignedBigInteger("order_id");
            $table->integer("quantity");
            $table->integer("product_price");
            $table->integer("product_discounted_price");
            $table->timestamps();

            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
