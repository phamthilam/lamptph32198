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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('product_size_id');
            $table->foreign('product_size_id')->references('id')->on('product_sizes')->onDelete('cascade');
            $table->unsignedInteger('product_color_id');
            $table->foreign('product_color_id')->references('id')->on('product_colors')->onDelete('cascade');
            $table->unsignedInteger('quatity')->default(0);
            $table->timestamps();
            $table->unique(['product_id', 'product_size_id', 'product_color_id'], 'product_variants_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
