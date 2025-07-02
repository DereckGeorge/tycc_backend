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
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('full_description')->nullable();
            $table->date('date');
            $table->date('end_date')->nullable();
            $table->time('time');
            $table->time('end_time')->nullable();
            $table->string('location');
            $table->string('address')->nullable();
            $table->integer('attendees_limit')->nullable();
            $table->integer('registered_attendees')->default(0);
            $table->decimal('price', 8, 2)->nullable();
            $table->string('currency')->nullable();
            $table->string('category');
            $table->boolean('featured')->default(false);
            $table->boolean('registration_open')->default(true);
            $table->date('registration_deadline')->nullable();
            $table->string('image')->nullable();
            $table->json('agenda')->nullable();
            $table->json('speakers')->nullable();
            $table->json('sponsors')->nullable();
            $table->json('requirements')->nullable();
            $table->string('status')->default('upcoming');
            $table->timestamps();
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
