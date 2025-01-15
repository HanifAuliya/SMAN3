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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul berita
            $table->foreignId('user_id')->nullable()->default(1)->constrained('users')->onDelete('cascade');
            $table->text('excerpt'); // Deskripsi singkat
            $table->longText('content'); // Konten berita lengkap
            $table->string('slug')->unique(); // Slug untuk URL
            $table->string('image')->nullable(); // Gambar berita
            $table->string('link')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Kategori
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
