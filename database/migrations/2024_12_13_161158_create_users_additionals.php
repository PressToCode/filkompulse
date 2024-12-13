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
        // Menambahkan kolom baru di events
        Schema::table('events', function (Blueprint $table) {
            //
        });

        // Membuat tabel Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->text('description');
        });

        // Membuat tabel Many-to-Many antara events dengan Categories
        Schema::create('events_has_categories', function(Blueprint $table) {
            $table->foreignId('events_id')->constrained()->onDelete('cascade');
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_has_categories');
        Schema::dropIfExists('categories');
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
