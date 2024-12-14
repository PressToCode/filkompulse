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
        if(Schema::hasTable('verified_users')) {
            Schema::create('events', function (Blueprint $table) {
                $table->id('eventsID')->primary();
                $table->foreignId('verifiedUserID')->constrained('verified_users', 'VerifiedID')->cascadeOnDelete();
                $table->string('title'); 
                $table->text('description')->nullable(); 
                $table->dateTime('date');
                $table->string('location_type');
                $table->string('location')->nullable();
                $table->timestamps(); 
            });
        }

        if(Schema::hasTable('keranjangs') && Schema::hasTable('events')) {
            Schema::create('keranjangHasEvents', function (Blueprint $table) {
                $table->id();
                $table->foreignId('keranjangID')->constrained('keranjangs', 'KeranjangID')->cascadeOnDelete();
                $table->foreignId('eventsID')->constrained('events', 'eventsID')->cascadeOnDelete();
            });
        }

        if(Schema::hasTable('users') && Schema::hasTable('events')) {
            Schema::create('reminders', function (Blueprint $table) {
                $table->id('reminderID')->primary();
                $table->foreignId('eventsID')->constrained('events', 'eventsID')->cascadeOnDelete();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                // $table->string('user_email');
                // $table->foreign('user_email')->references('email')->on('users')->cascadeOnDelete();
                $table->date('reminderDate');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
