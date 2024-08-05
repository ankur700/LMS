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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('author')->nullable();
            $table->string('isbn')->nullable();
            $table->foreignId('book_category_id')->constrained('book_categories')->onDelete('cascade');
            $table->foreignId('shelf_id')->constrained('shelves')->onDelete('cascade');
            $table->string('publisher')->nullable();
            $table->year('published_year')->nullable();
            $table->tinyInteger('book_count')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
