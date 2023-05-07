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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('date')->nullable();
            $table->longText('link')->nullable();
            $table->string('hashtag')->nullable();
            $table->string('sponsors')->nullable();
            $table->timestamps();
            $table->foreign('resource_id')->references('id')->on('resources')
            ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
