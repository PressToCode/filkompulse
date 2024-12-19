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
        // Membuat tabel Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id('categoryID');
            $table->string('categoryName')->unique();
            $table->text('categoryDescription')->nullable();
            $table->string('categoryImageURL', 200)->nullable();
            $table->timestamps();
        });

        if(Schema::hasTable('events')) {
            if(Schema::hasTable('categories')) {
                Schema::create('events_has_categories', function(Blueprint $table) {
                    $table->foreignId('events_id')->constrained('events', 'eventsID')->onDelete('cascade');
                    $table->foreignId('categories_id')->constrained('categories', 'categoryID')->onDelete('cascade');
                    $table->timestamps();

                    $table->unique(['events_id', 'categories_id']);
                });
            }

            Schema::create('links', function (Blueprint $table) {
                $table->id('linkID')->primary();
                $table->foreignId('events_id')->constrained('events', 'eventsID')->onDelete('cascade');
                $table->string('URL', 150);
                $table->timestamps();
            });

            Schema::create('images', function (Blueprint $table) {
                $table->id('imageID')->primary();
                $table->foreignId('events_id')->constrained('events', 'eventsID')->onDelete('cascade');
                $table->string('imageURL', 200);
                $table->timestamps();
            });
        }

        if(Schema::hasTable('users')) {
            Schema::table('google_account_auths', function (Blueprint $table) {
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('token')->nullable();
                $table->string('refreshToken')->nullable();
                $table->time('expiresIn')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('google_account_auths', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::dropIfExists('images');
        Schema::dropIfExists('links');
        Schema::dropIfExists('events_has_categories');
        Schema::dropIfExists('categories');
    }
};
