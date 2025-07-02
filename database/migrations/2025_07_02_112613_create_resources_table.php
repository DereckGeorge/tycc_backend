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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('category');
            $table->string('file_path');
            $table->string('file_size');
            $table->string('file_size_formatted');
            $table->integer('download_count')->default(0);
            $table->boolean('featured')->default(false);
            $table->string('status')->default('active');
            $table->string('access_level')->default('public');
            $table->json('tags')->nullable();
            $table->string('version')->nullable();
            $table->string('language')->default('English');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
