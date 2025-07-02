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
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->unique();

            // Personal Info
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('region');
            $table->string('district');
            $table->string('address');

            // Education
            $table->string('highest_level');
            $table->string('institution');
            $table->string('field_of_study');
            $table->string('graduation_year');

            // Business Info
            $table->boolean('has_business');
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_stage')->nullable();
            $table->string('registration_status')->nullable();
            $table->string('employees_count')->nullable();
            $table->string('annual_revenue')->nullable();
            $table->text('business_description')->nullable();

            // Interests
            $table->json('programs_of_interest')->nullable();
            $table->json('skills_to_develop')->nullable();
            $table->string('mentorship_interest')->nullable();
            $table->boolean('volunteer_interest')->nullable();

            // References
            $table->json('references')->nullable();

            // Documents
            $table->string('id_document')->nullable();
            $table->string('cv')->nullable();
            $table->string('business_certificate')->nullable();

            // Agreements
            $table->boolean('terms_and_conditions');
            $table->boolean('privacy_policy');
            $table->boolean('code_of_conduct');
            $table->boolean('newsletter_subscription');

            // Status
            $table->string('status')->default('pending_review');
            $table->string('member_id')->nullable()->unique();
            $table->timestamp('reviewed_at')->nullable();
            $table->json('status_history')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
