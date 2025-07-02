<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ResourceController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/resources",
     *     tags={"Resources"},
     *     summary="Get a list of resources",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $resources = Resource::all();
        return $this->sendResponse($resources, 'Resources retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/resources",
     *     tags={"Resources"},
     *     summary="Create a new resource",
     *     @OA\Response(response="201", description="Resource created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'category' => 'required',
            'file' => 'required|file',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $file = $request->file('file');
        $path = $file->store('resources');
        
        $resource = Resource::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'category' => $request->category,
            'file_path' => $path,
            'file_size' => $file->getSize(),
            'file_size_formatted' => $this->formatSizeUnits($file->getSize()),
        ]);

        return $this->sendResponse($resource, 'Resource created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/resources/{id}",
     *     tags={"Resources"},
     *     summary="Get a specific resource",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Resource $resource)
    {
        return $this->sendResponse($resource, 'Resource retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/resources/{id}",
     *     tags={"Resources"},
     *     summary="Update a resource",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Resource updated")
     * )
     */
    public function update(Request $request, Resource $resource)
    {
        $resource->update($request->all());
        return $this->sendResponse($resource, 'Resource updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/resources/{id}",
     *     tags={"Resources"},
     *     summary="Delete a resource",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Resource deleted")
     * )
     */
    public function destroy(Resource $resource)
    {
        Storage::delete($resource->file_path);
        $resource->delete();
        return $this->sendResponse([], 'Resource deleted successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/resources/{id}/download",
     *     tags={"Resources"},
     *     summary="Track resource download and get URL",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Download URL generated")
     * )
     */
    public function download(Request $request, Resource $resource)
    {
        $resource->increment('download_count');

        return Storage::download($resource->file_path);
    }

    private function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
