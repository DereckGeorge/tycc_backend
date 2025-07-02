<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\MembershipApplication;
use App\Models\Program;
use App\Models\Event;
use App\Models\Partner;
use Carbon\Carbon;

class StatisticsController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/statistics",
     *     tags={"Statistics"},
     *     summary="Get public statistics",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $stats = [
            'members' => [
                'total' => MembershipApplication::where('status', 'approved')->count(),
                'new_this_month' => MembershipApplication::where('status', 'approved')->whereMonth('created_at', Carbon::now()->month)->count(),
                'active' => MembershipApplication::where('status', 'approved')->count(), // This is a simplification
            ],
            'programs' => [
                'total' => Program::count(),
                'active' => Program::where('status', 'active')->count(),
                'participants_total' => Program::sum('participants'),
            ],
            'events' => [
                'total_hosted' => Event::where('date', '<', Carbon::now())->count(),
                'upcoming' => Event::where('date', '>=', Carbon::now())->count(),
                'total_attendees' => Event::sum('registered_attendees'),
            ],
            'partners' => [
                'total' => Partner::count(),
                'active' => Partner::where('status', 'active')->count(),
                'categories' => Partner::select('category', \DB::raw('count(*) as total'))
                                        ->groupBy('category')
                                        ->pluck('total', 'category'),
            ]
        ];

        return $this->sendResponse($stats, 'Statistics retrieved successfully.');
    }
}
