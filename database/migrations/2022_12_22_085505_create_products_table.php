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
            $table->string("title");
            $table->longText("description")->nullable();
            $table->enum("status", ["publish", "draft", "passive"])->default("draft");
            $table->integer("price");
            $table->integer("quantity");
            $table->integer("discount")->nullable();
            $table->timestamp("discount_finished_at")->nullable();
            $table->timestamp("product_finished_at")->nullable();
            $table->string("image1");
            $table->string("image2")->nullable();
            $table->string("image3")->nullable();
            $table->string("image1_id")->nullable();
            $table->string("image2_id")->nullable();
            $table->string("image3_id")->nullable();
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
