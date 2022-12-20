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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->string('title');
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('advertiser_id');
            $table->date('start_date');
            // foreign keys
            $table->foreign('category_id')
                ->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('advertiser_id')
                ->references('id')->on('advertisers')->onDelete('cascade');
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
        Schema::dropIfExists('ads');
    }
};
