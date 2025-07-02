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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('company');
            $table->text('testimonial');
            $table->string('avatar')->nullable();
            $table->integer('rating')->default(5);
            $table->foreignId('program_id')->nullable()->constrained()->onDelete('set null');
            $table->string('status')->default('active');
            $table->boolean('featured')->default(false);
            $table->string('video_testimonial')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
