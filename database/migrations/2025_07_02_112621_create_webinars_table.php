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
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('full_description')->nullable();
            $table->string('duration');
            $table->date('date');
            $table->time('time')->nullable();
            $table->string('speaker');
            $table->text('speaker_bio')->nullable();
            $table->string('video_url');
            $table->string('thumbnail')->nullable();
            $table->string('category')->default('general');
            $table->integer('views')->default(0);
            $table->boolean('featured')->default(false);
            $table->string('status')->default('published');
            $table->boolean('registration_required')->default(false);
            $table->integer('max_attendees')->nullable();
            $table->integer('registered_attendees')->default(0);
            $table->json('tags')->nullable();
            $table->json('resources')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};
