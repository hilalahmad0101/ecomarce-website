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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name')->unique();
            $table->text('slug')->unique();
            $table->text('featured_image');
            $table->json('images');
            $table->longText('short_description');
            $table->longText('description');
            $table->json('tags');
            $table->json('specifications');
            $table->text('meta_keyword');
            $table->longText('meta_description');
            $table->string('current_price');
            $table->string('previous_price');
            $table->foreignId('cat_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_cat_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->foreignId('child_cat_id')->constrained('child_categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('total_stock');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
