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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('full_description');
            $table->string('category');
            $table->string('duration');
            $table->integer('participants')->default(0);
            $table->string('icon')->nullable();
            $table->json('features')->nullable();
            $table->json('requirements')->nullable();
            $table->date('next_intake')->nullable();
            $table->string('location');
            $table->string('cost');
            $table->string('status')->default('active');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
