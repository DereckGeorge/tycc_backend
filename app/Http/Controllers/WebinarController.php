<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class WebinarController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/webinars",
     *     tags={"Webinars"},
     *     summary="Get a list of webinars",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $webinars = Webinar::all();
        return $this->sendResponse($webinars, 'Webinars retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/webinars",
     *     tags={"Webinars"},
     *     summary="Create a new webinar",
     *     @OA\Response(response="201", description="Webinar created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'date' => 'required|date',
            'speaker' => 'required',
            'video' => 'required|file',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $videoPath = $request->file('video')->store('webinars');
        $thumbnailPath = $request->file('thumbnail') ? $request->file('thumbnail')->store('webinars/thumbnails') : null;

        $data = $request->all();
        $data['video_url'] = Storage::url($videoPath);
        $data['thumbnail'] = $thumbnailPath ? Storage::url($thumbnailPath) : null;

        $webinar = Webinar::create($data);

        return $this->sendResponse($webinar, 'Webinar created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/webinars/{id}",
     *     tags={"Webinars"},
     *     summary="Get a specific webinar",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Webinar $webinar)
    {
        return $this->sendResponse($webinar, 'Webinar retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/webinars/{id}",
     *     tags={"Webinars"},
     *     summary="Update a webinar",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Webinar updated")
     * )
     */
    public function update(Request $request, Webinar $webinar)
    {
        $webinar->update($request->all());
        return $this->sendResponse($webinar, 'Webinar updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/webinars/{id}",
     *     tags={"Webinars"},
     *     summary="Delete a webinar",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Webinar deleted")
     * )
     */
    public function destroy(Webinar $webinar)
    {
        Storage::delete(str_replace('/storage', 'public', $webinar->video_url));
        if ($webinar->thumbnail) {
            Storage::delete(str_replace('/storage', 'public', $webinar->thumbnail));
        }
        $webinar->delete();
        return $this->sendResponse([], 'Webinar deleted successfully.');
    }
}
