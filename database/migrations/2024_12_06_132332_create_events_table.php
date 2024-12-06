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
        Schema::create('events', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID column
            $table->string('title');  // 'title' column with string type
            $table->text('description');  // 'description' column with text type (to store longer text)
            $table->date('date');  // 'date' column for the event date
            $table->string('image');  // 'image' column to store the image URL
            $table->boolean('has_reminder')->default(false);  // 'has_reminder' column as a boolean (default to false)
            $table->boolean('is_selected')->default(false);  // 'is_selected' column as a boolean (default to false)
            $table->timestamps();  // Laravel's default timestamps (created_at and updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
