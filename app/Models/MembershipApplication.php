<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembershipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'nationality',
        'region',
        'district',
        'address',
        'highest_level',
        'institution',
        'field_of_study',
        'graduation_year',
        'has_business',
        'business_name',
        'business_type',
        'business_stage',
        'registration_status',
        'employees_count',
        'annual_revenue',
        'business_description',
        'programs_of_interest',
        'skills_to_develop',
        'mentorship_interest',
        'volunteer_interest',
        'references',
        'id_document',
        'cv',
        'business_certificate',
        'terms_and_conditions',
        'privacy_policy',
        'code_of_conduct',
        'newsletter_subscription',
        'status',
        'member_id',
        'reviewed_at',
        'status_history',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'has_business' => 'boolean',
        'programs_of_interest' => 'array',
        'skills_to_develop' => 'array',
        'volunteer_interest' => 'boolean',
        'references' => 'array',
        'terms_and_conditions' => 'boolean',
        'privacy_policy' => 'boolean',
        'code_of_conduct' => 'boolean',
        'newsletter_subscription' => 'boolean',
        'reviewed_at' => 'datetime',
        'status_history' => 'array',
    ];
}
