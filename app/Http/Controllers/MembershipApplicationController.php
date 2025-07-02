<?php

namespace App\Http\Controllers;

use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MembershipApplicationController extends BaseController
{
    /**
     * @OA\Post(
     *     path="/api/v1/join-tycc",
     *     tags={"Membership"},
     *     summary="Submit a membership application",
     *     @OA\Response(response="200", description="Application submitted successfully")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'personal_info.first_name' => 'required',
            'personal_info.last_name' => 'required',
            'personal_info.email' => 'required|email',
            'personal_info.phone' => 'required',
            'personal_info.date_of_birth' => 'required|date',
            'agreements.terms_and_conditions' => 'accepted',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $personalInfo = $request->personal_info;
        $education = $request->education;
        $businessInfo = $request->business_info;
        $interests = $request->interests;
        $references = $request->references;
        $agreements = $request->agreements;

        $application = MembershipApplication::create([
            'application_id' => 'TYCC-APP-' . date('Y') . '-' . Str::random(4),
            'first_name' => $personalInfo['first_name'],
            'last_name' => $personalInfo['last_name'],
            'email' => $personalInfo['email'],
            'phone' => $personalInfo['phone'],
            'date_of_birth' => $personalInfo['date_of_birth'],
            'gender' => $personalInfo['gender'],
            'nationality' => $personalInfo['nationality'],
            'region' => $personalInfo['region'],
            'district' => $personalInfo['district'],
            'address' => $personalInfo['address'],

            'highest_level' => $education['highest_level'],
            'institution' => $education['institution'],
            'field_of_study' => $education['field_of_study'],
            'graduation_year' => $education['graduation_year'],

            'has_business' => $businessInfo['has_business'],
            'business_name' => $businessInfo['business_name'] ?? null,
            'business_type' => $businessInfo['business_type'] ?? null,
            'business_stage' => $businessInfo['business_stage'] ?? null,
            'registration_status' => $businessInfo['registration_status'] ?? null,
            'employees_count' => $businessInfo['employees_count'] ?? null,
            'annual_revenue' => $businessInfo['annual_revenue'] ?? null,
            'business_description' => $businessInfo['business_description'] ?? null,

            'programs_of_interest' => $interests['programs_of_interest'] ?? null,
            'skills_to_develop' => $interests['skills_to_develop'] ?? null,
            'mentorship_interest' => $interests['mentorship_interest'] ?? null,
            'volunteer_interest' => $interests['volunteer_interest'] ?? null,
            
            'references' => $references,

            'terms_and_conditions' => $agreements['terms_and_conditions'],
            'privacy_policy' => $agreements['privacy_policy'],
            'code_of_conduct' => $agreements['code_of_conduct'],
            'newsletter_subscription' => $agreements['newsletter_subscription'],
        ]);

        return $this->sendResponse($application, 'Your membership application has been submitted successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/membership-status/{application_id}",
     *     tags={"Membership"},
     *     summary="Check membership application status",
     *     @OA\Parameter(name="application_id", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show($application_id)
    {
        $application = MembershipApplication::where('application_id', $application_id)->first();

        if (is_null($application)) {
            return $this->sendError('Application not found.');
        }

        return $this->sendResponse($application, 'Application status retrieved successfully.');
    }
}
