<?php

namespace App\Http\Controllers;

use App\Models\PartnershipOpportunity;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class PartnershipOpportunityController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/partnership-opportunities",
     *     tags={"Partnership Opportunities"},
     *     summary="Get a list of partnership opportunities",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $opportunities = PartnershipOpportunity::all();
        return $this->sendResponse($opportunities, 'Partnership opportunities retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/partnership-opportunities",
     *     tags={"Partnership Opportunities"},
     *     summary="Create a new partnership opportunity",
     *     @OA\Response(response="201", description="Partnership opportunity created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $opportunity = PartnershipOpportunity::create($request->all());

        return $this->sendResponse($opportunity, 'Partnership opportunity created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/partnership-opportunities/{id}",
     *     tags={"Partnership Opportunities"},
     *     summary="Get a specific partnership opportunity",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(PartnershipOpportunity $partnershipOpportunity)
    {
        return $this->sendResponse($partnershipOpportunity, 'Partnership opportunity retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/partnership-opportunities/{id}",
     *     tags={"Partnership Opportunities"},
     *     summary="Update a partnership opportunity",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Partnership opportunity updated")
     * )
     */
    public function update(Request $request, PartnershipOpportunity $partnershipOpportunity)
    {
        $partnershipOpportunity->update($request->all());
        return $this->sendResponse($partnershipOpportunity, 'Partnership opportunity updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/partnership-opportunities/{id}",
     *     tags={"Partnership Opportunities"},
     *     summary="Delete a partnership opportunity",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Partnership opportunity deleted")
     * )
     */
    public function destroy(PartnershipOpportunity $partnershipOpportunity)
    {
        $partnershipOpportunity->delete();
        return $this->sendResponse([], 'Partnership opportunity deleted successfully.');
    }
}
