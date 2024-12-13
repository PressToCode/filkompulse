<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Membuat tabel competitions
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('full_description');
            $table->string('image_url');
            $table->string('location');
            $table->date('date');
            $table->timestamps();
        });

        // Membuat tabel competition_details
        Schema::create('competition_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->onDelete('cascade'); // Relasi ke competitions
            $table->string('title');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });

        // Membuat tabel competition_types
        Schema::create('competition_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->onDelete('cascade'); // Relasi ke competitions
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Urutan penghapusan: tabel yang bergantung dihapus lebih dulu
        Schema::dropIfExists('competition_types');
        Schema::dropIfExists('competition_details');
        Schema::dropIfExists('competitions');
    }
};
