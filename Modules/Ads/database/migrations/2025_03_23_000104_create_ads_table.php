<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('summary')->nullable();
            $table->text('description')->nullable();
            $table->text('address');
            $table->string('amount');
            $table->text('image')->nullable();
            $table->text('background')->nullable();
            $table->string('floor')->nullable();
            $table->string('year')->nullable();
            $table->tinyInteger('storeroom')->default(0);
            $table->tinyInteger('balcony')->default(0);
            $table->string('area')->nullable();
            $table->string('toilet')->nullable();
            $table->tinyInteger('parking')->default(0);
            $table->text('tag')->nullable();
            $table->string('type');
            $table->tinyInteger('sell_status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('show_in_slider')->default(0);
            $table->bigInteger('view')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
