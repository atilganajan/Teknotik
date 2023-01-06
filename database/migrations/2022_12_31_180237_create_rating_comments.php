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
        Schema::create('rating_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->unsignedBigInteger("product_id");
            $table->integer("rating");
            $table->longText("rating_comment")->nullable();

            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");

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
        Schema::dropIfExists('rating_comments');
    }
};
