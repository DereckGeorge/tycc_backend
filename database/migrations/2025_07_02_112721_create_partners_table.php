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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('category');
            $table->text('description');
            $table->text('partnership_details');
            $table->string('website')->nullable();
            $table->string('partnership_since');
            $table->string('partnership_type')->nullable();
            $table->string('status')->default('active');
            $table->boolean('featured')->default(false);
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->json('services_provided')->nullable();
            $table->json('sectors_focus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
