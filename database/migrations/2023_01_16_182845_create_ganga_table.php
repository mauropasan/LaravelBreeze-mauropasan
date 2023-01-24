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
        Schema::create('ganga', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('title');
            $table->string('description');
            $table->string('img_url');
            $table->bigInteger('category_id');
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('unlikes')->default(0);
            $table->double('price');
            $table->double('price_sale');
            $table->boolean('available')->default(1);
            $table->bigInteger('user_id');

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('ganga');
    }
};
