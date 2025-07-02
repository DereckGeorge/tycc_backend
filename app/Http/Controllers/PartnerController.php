<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PartnerController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/partners",
     *     tags={"Partners"},
     *     summary="Get a list of partners",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $partners = Partner::all();
        return $this->sendResponse($partners, 'Partners retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/partners",
     *     tags={"Partners"},
     *     summary="Create a new partner",
     *     @OA\Response(response="201", description="Partner created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'partnership_details' => 'required',
            'partnership_since' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::url($request->file('logo')->store('partners'));
        }

        $partner = Partner::create($data);

        return $this->sendResponse($partner, 'Partner created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/partners/{id}",
     *     tags={"Partners"},
     *     summary="Get a specific partner",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Partner $partner)
    {
        return $this->sendResponse($partner, 'Partner retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/partners/{id}",
     *     tags={"Partners"},
     *     summary="Update a partner",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Partner updated")
     * )
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($request->all());
        return $this->sendResponse($partner, 'Partner updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/partners/{id}",
     *     tags={"Partners"},
     *     summary="Delete a partner",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Partner deleted")
     * )
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::delete(str_replace('/storage', 'public', $partner->logo));
        }
        $partner->delete();
        return $this->sendResponse([], 'Partner deleted successfully.');
    }
}
