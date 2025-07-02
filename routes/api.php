<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnershipOpportunityController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\MembershipApplicationController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TestimonialController;

Route::prefix('v1')->group(function () {
    Route::apiResource('programs', ProgramController::class);
    Route::apiResource('news', NewsController::class);
    Route::apiResource('events', EventController::class);
    Route::post('events/{event}/register', [EventController::class, 'register']);
    Route::apiResource('resources', ResourceController::class);
    Route::post('resources/{resource}/download', [ResourceController::class, 'download']);
    Route::apiResource('webinars', WebinarController::class);
    Route::apiResource('partners', PartnerController::class);
    Route::apiResource('partnership-opportunities', PartnershipOpportunityController::class);
    Route::post('contact', [ContactMessageController::class, 'store']);
    Route::get('contact-info', [ContactMessageController::class, 'info']);
    Route::post('join-tycc', [MembershipApplicationController::class, 'store']);
    Route::get('membership-status/{application_id}', [MembershipApplicationController::class, 'show']);
    Route::post('newsletter/subscribe', [NewsletterSubscriptionController::class, 'subscribe']);
    Route::post('newsletter/unsubscribe', [NewsletterSubscriptionController::class, 'unsubscribe']);
    Route::get('statistics', [StatisticsController::class, 'index']);
    Route::apiResource('testimonials', TestimonialController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); 