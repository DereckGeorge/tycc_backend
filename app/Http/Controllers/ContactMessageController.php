<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ContactMessageController extends BaseController
{
    /**
     * @OA\Post(
     *     path="/api/v1/contact",
     *     tags={"Contact"},
     *     summary="Submit a contact form message",
     *     @OA\Response(response="200", description="Message sent successfully")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = $request->all();
        $data['reference_number'] = 'TYCC-' . date('Y') . '-' . Str::random(4);

        $message = ContactMessage::create($data);

        return $this->sendResponse($message, 'Your message has been sent successfully. We will get back to you soon.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/contact-info",
     *     tags={"Contact"},
     *     summary="Get contact information",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function info()
    {
        $contactInfo = [
            'address' => [
                'street' => '123 Business District',
                'city' => 'Dar es Salaam',
                'country' => 'Tanzania',
                'postal_code' => 'P.O. Box 12345'
            ],
            'phone' => ['+255 123 456 789', '+255 987 654 321'],
            'email' => [
                'general' => 'info@tycc.or.tz',
                'programs' => 'programs@tycc.or.tz',
                'partnerships' => 'partnerships@tycc.or.tz'
            ],
            'office_hours' => [
                'monday_friday' => '8:00 AM - 5:00 PM',
                'saturday' => '9:00 AM - 1:00 PM',
                'sunday' => 'Closed'
            ],
            'social_media' => [
                'facebook' => 'https://facebook.com/tycc',
                'twitter' => 'https://twitter.com/tycc',
                'instagram' => 'https://instagram.com/tycc',
                'linkedin' => 'https://linkedin.com/company/tycc'
            ]
        ];

        return $this->sendResponse($contactInfo, 'Contact information retrieved successfully.');
    }
}
