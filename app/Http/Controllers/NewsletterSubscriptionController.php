<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsletterSubscriptionController extends BaseController
{
    /**
     * @OA\Post(
     *     path="/api/v1/newsletter/subscribe",
     *     tags={"Newsletter"},
     *     summary="Subscribe to newsletter",
     *     @OA\Response(response="200", description="Successfully subscribed")
     * )
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscriptions,email',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $subscription = NewsletterSubscription::create([
            'subscription_id' => 'TYCC-SUB-' . date('Y') . '-' . Str::random(4),
            'email' => $request->email,
            'name' => $request->name,
            'interests' => $request->interests,
            'frequency' => $request->frequency,
        ]);

        return $this->sendResponse($subscription, 'Successfully subscribed to newsletter.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/newsletter/unsubscribe",
     *     tags={"Newsletter"},
     *     summary="Unsubscribe from newsletter",
     *     @OA\Response(response="200", description="Successfully unsubscribed")
     * )
     */
    public function unsubscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:newsletter_subscriptions,email',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $subscription = NewsletterSubscription::where('email', $request->email)->first();
        $subscription->delete();

        return $this->sendResponse([], 'Successfully unsubscribed from newsletter.');
    }
}
