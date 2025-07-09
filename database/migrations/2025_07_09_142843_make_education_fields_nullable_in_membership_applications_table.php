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
        Schema::table('membership_applications', function (Blueprint $table) {
            $table->string('highest_level')->nullable()->change();
            $table->string('institution')->nullable()->change();
            $table->string('field_of_study')->nullable()->change();
            $table->string('graduation_year')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('membership_applications', function (Blueprint $table) {
            $table->string('highest_level')->nullable(false)->change();
            $table->string('institution')->nullable(false)->change();
            $table->string('field_of_study')->nullable(false)->change();
            $table->string('graduation_year')->nullable(false)->change();
        });
    }
};
