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
        Schema::create('author_stats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('author_id');
            $table->integer('likes');
            $table->integer('waves');
            $table->integer('amount_sold');
            $table->integer('followers');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_stats');
    }
};
