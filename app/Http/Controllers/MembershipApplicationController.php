<?php

namespace App\Http\Controllers;

use App\Models\MembershipApplication;
use App\Models\User;
use App\Notifications\NewMembershipApplicationNotification;
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
     *     description="Submit a new membership application to Tanzania Youth Chamber of Commerce",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Membership application data",
     *         @OA\JsonContent(
     *             type="object",
     *             required={"personal_info", "agreements"},
     *             @OA\Property(
     *                 property="personal_info",
     *                 type="object",
     *                 required={"first_name", "last_name", "email", "phone", "date_of_birth"},
     *                 @OA\Property(property="first_name", type="string", example="John"),
     *                 @OA\Property(property="last_name", type="string", example="Doe"),
     *                 @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *                 @OA\Property(property="phone", type="string", example="+255712345678"),
     *                 @OA\Property(property="date_of_birth", type="string", format="date", example="1995-06-15"),
     *                 @OA\Property(property="gender", type="string", enum={"male", "female", "other"}, example="male"),
     *                 @OA\Property(property="nationality", type="string", example="Tanzanian"),
     *                 @OA\Property(property="region", type="string", example="Dar es Salaam"),
     *                 @OA\Property(property="district", type="string", example="Kinondoni"),
     *                 @OA\Property(property="address", type="string", example="123 Main Street, Msasani")
     *             ),
     *             @OA\Property(
     *                 property="education",
     *                 type="object",
     *                 @OA\Property(property="highest_level", type="string", enum={"certificate", "diploma", "degree", "masters", "phd"}, example="degree"),
     *                 @OA\Property(property="institution", type="string", example="University of Dar es Salaam"),
     *                 @OA\Property(property="field_of_study", type="string", example="Computer Science"),
     *                 @OA\Property(property="graduation_year", type="string", example="2020")
     *             ),
     *             @OA\Property(
     *                 property="business_info",
     *                 type="object",
     *                 @OA\Property(property="has_business", type="boolean", example=true),
     *                 @OA\Property(property="business_name", type="string", example="Tech Solutions Ltd"),
     *                 @OA\Property(property="business_type", type="string", enum={"sole_proprietorship", "partnership", "limited_company", "ngo"}, example="limited_company"),
     *                 @OA\Property(property="business_stage", type="string", enum={"idea", "startup", "growth", "established"}, example="startup"),
     *                 @OA\Property(property="registration_status", type="string", enum={"registered", "not_registered", "in_process"}, example="registered"),
     *                 @OA\Property(property="employees_count", type="string", enum={"1", "2-5", "6-10", "11-50", "50+"}, example="2-5"),
     *                 @OA\Property(property="annual_revenue", type="string", enum={"0-1M", "1M-5M", "5M-20M", "20M+"}, example="1M-5M"),
     *                 @OA\Property(property="business_description", type="string", example="Software development and IT consulting services")
     *             ),
     *             @OA\Property(
     *                 property="interests",
     *                 type="object",
     *                 @OA\Property(
     *                     property="programs_of_interest",
     *                     type="array",
     *                     @OA\Items(type="string", enum={"entrepreneurship", "leadership", "trade", "networking", "innovation"})
     *                 ),
     *                 @OA\Property(
     *                     property="skills_to_develop",
     *                     type="array",
     *                     @OA\Items(type="string", enum={"business_planning", "marketing", "finance", "leadership", "technology"})
     *                 ),
     *                 @OA\Property(property="mentorship_interest", type="string", enum={"mentor", "mentee", "both", "none"}, example="mentee"),
     *                 @OA\Property(property="volunteer_interest", type="boolean", example=true)
     *             ),
     *             @OA\Property(
     *                 property="references",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="name", type="string", example="Jane Smith"),
     *                     @OA\Property(property="relationship", type="string", example="Former Supervisor"),
     *                     @OA\Property(property="phone", type="string", example="+255712345679"),
     *                     @OA\Property(property="email", type="string", example="jane.smith@company.com")
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="agreements",
     *                 type="object",
     *                 required={"terms_and_conditions", "privacy_policy", "code_of_conduct"},
     *                 @OA\Property(property="terms_and_conditions", type="boolean", example=true),
     *                 @OA\Property(property="privacy_policy", type="boolean", example=true),
     *                 @OA\Property(property="code_of_conduct", type="boolean", example=true),
     *                 @OA\Property(property="newsletter_subscription", type="boolean", example=false)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Application submitted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="application_id", type="string", example="TYCC-APP-2025-ABCD"),
     *                 @OA\Property(property="status", type="string", example="pending_review"),
     *                 @OA\Property(property="first_name", type="string", example="John"),
     *                 @OA\Property(property="last_name", type="string", example="Doe"),
     *                 @OA\Property(property="email", type="string", example="john.doe@example.com")
     *             ),
     *             @OA\Property(property="message", type="string", example="Your membership application has been submitted successfully.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Validation Error."),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="personal_info.email", type="array", 
     *                     @OA\Items(type="string", example="The personal info.email field is required.")
     *                 )
     *             )
     *         )
     *     )
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
            'agreements.terms_and_conditions' => 'required|accepted',
            'agreements.privacy_policy' => 'required|accepted',
            'agreements.code_of_conduct' => 'required|accepted',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $personalInfo = $request->personal_info ?? [];
        $education = $request->education ?? [];
        $businessInfo = $request->business_info ?? [];
        $interests = $request->interests ?? [];
        $references = $request->references ?? [];
        $agreements = $request->agreements ?? [];

        $application = MembershipApplication::create([
            'application_id' => 'TYCC-APP-' . date('Y') . '-' . Str::random(4),
            'first_name' => $personalInfo['first_name'],
            'last_name' => $personalInfo['last_name'],
            'email' => $personalInfo['email'],
            'phone' => $personalInfo['phone'],
            'date_of_birth' => $personalInfo['date_of_birth'],
            'gender' => $personalInfo['gender'] ?? null,
            'nationality' => $personalInfo['nationality'] ?? null,
            'region' => $personalInfo['region'] ?? null,
            'district' => $personalInfo['district'] ?? null,
            'address' => $personalInfo['address'] ?? null,

            'highest_level' => $education['highest_level'] ?? null,
            'institution' => $education['institution'] ?? null,
            'field_of_study' => $education['field_of_study'] ?? null,
            'graduation_year' => $education['graduation_year'] ?? null,

            'has_business' => $businessInfo['has_business'] ?? false,
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
            'newsletter_subscription' => $agreements['newsletter_subscription'] ?? false,
        ]);

        // Send email notification to administrators
        $adminEmails = ['eridericgeorge@gmail.com', 'admin@tycc.or.tz'];
        
        foreach ($adminEmails as $email) {
            $admin = User::where('email', $email)->first();
            if ($admin) {
                $admin->notify(new NewMembershipApplicationNotification($application));
            }
        }

        return $this->sendResponse($application, 'Your membership application has been submitted successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/membership-status/{application_id}",
     *     tags={"Membership"},
     *     summary="Check membership application status",
     *     description="Retrieve the status and details of a membership application using the application ID",
     *     @OA\Parameter(
     *         name="application_id",
     *         in="path",
     *         required=true,
     *         description="The unique application ID (e.g., TYCC-APP-2025-ABCD)",
     *         @OA\Schema(type="string", example="TYCC-APP-2025-ABCD")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Application found successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="application_id", type="string", example="TYCC-APP-2025-ABCD"),
     *                 @OA\Property(property="status", type="string", enum={"pending_review", "under_review", "approved", "rejected"}, example="pending_review"),
     *                 @OA\Property(property="first_name", type="string", example="John"),
     *                 @OA\Property(property="last_name", type="string", example="Doe"),
     *                 @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *                 @OA\Property(property="phone", type="string", example="+255712345678"),
     *                 @OA\Property(property="member_id", type="string", nullable=true, example="TYCC-MEM-2025-001"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-09T10:30:00.000000Z"),
     *                 @OA\Property(property="reviewed_at", type="string", format="date-time", nullable=true, example=null)
     *             ),
     *             @OA\Property(property="message", type="string", example="Application status retrieved successfully.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Application not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Application not found."),
     *             @OA\Property(property="data", type="array", @OA\Items())
     *         )
     *     )
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
