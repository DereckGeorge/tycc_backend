<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="TYCC Website API",
 *      description="API documentation for the TYCC website",
 *      @OA\Contact(
 *          email="info@tycc.or.tz"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * @OA\Tag(name="Programs", description="API for managing programs")
 * @OA\Tag(name="News", description="API for managing news articles")
 * @OA\Tag(name="Events", description="API for managing events")
 * @OA\Tag(name="Resources", description="API for managing resources")
 * @OA\Tag(name="Webinars", description="API for managing webinars")
 * @OA\Tag(name="Partners", description="API for managing partners")
 * @OA\Tag(name="Partnership Opportunities", description="API for managing partnership opportunities")
 * @OA\Tag(name="Contact", description="API for managing contact messages and info")
 * @OA\Tag(name="Membership", description="API for managing membership applications")
 * @OA\Tag(name="Newsletter", description="API for managing newsletter subscriptions")
 * @OA\Tag(name="Statistics", description="API for retrieving statistics")
 * @OA\Tag(name="Testimonials", description="API for managing testimonials")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
