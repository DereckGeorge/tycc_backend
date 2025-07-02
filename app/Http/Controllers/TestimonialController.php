<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/testimonials",
     *     tags={"Testimonials"},
     *     summary="Get a list of testimonials",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return $this->sendResponse($testimonials, 'Testimonials retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/testimonials",
     *     tags={"Testimonials"},
     *     summary="Create a new testimonial",
     *     @OA\Response(response="201", description="Testimonial created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'company' => 'required',
            'testimonial' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $testimonial = Testimonial::create($request->all());

        return $this->sendResponse($testimonial, 'Testimonial created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/testimonials/{id}",
     *     tags={"Testimonials"},
     *     summary="Get a specific testimonial",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Testimonial $testimonial)
    {
        return $this->sendResponse($testimonial, 'Testimonial retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/testimonials/{id}",
     *     tags={"Testimonials"},
     *     summary="Update a testimonial",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Testimonial updated")
     * )
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update($request->all());

        return $this->sendResponse($testimonial, 'Testimonial updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/testimonials/{id}",
     *     tags={"Testimonials"},
     *     summary="Delete a testimonial",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Testimonial deleted")
     * )
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return $this->sendResponse([], 'Testimonial deleted successfully.');
    }
}
