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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("phone");
            $table->longText("address");
            $table->enum("status", ["waiting","accept", "prepare", "shipped","delivered","cancelled"])->default("waiting");
            $table->unsignedBigInteger("user_id");
            $table->integer("total");
            $table->integer("total_discount");
            $table->integer("base_total");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
