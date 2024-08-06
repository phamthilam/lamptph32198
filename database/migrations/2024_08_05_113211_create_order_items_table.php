<?php

use App\Models\Order;
use App\Models\ProductVarisant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
           
            $table->unsignedInteger('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');

            $table->unsignedInteger('quatity')->default(0);

            // Sao lưu thông tin sản phẩm
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->double('product_price');

            // Sao lưu thông tin biến thể
            $table->string('variant_size_name');
            $table->string('variant_color_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
