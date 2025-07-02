<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/news",
     *     tags={"News"},
     *     summary="Get a list of news articles",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $news = News::all();
        return $this->sendResponse($news, 'News articles retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/news",
     *     tags={"News"},
     *     summary="Create a new news article",
     *     @OA\Response(response="201", description="Article created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'category' => 'required',
            'date' => 'required|date',
            'author' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $news = News::create($data);

        return $this->sendResponse($news, 'News article created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/news/{slug}",
     *     tags={"News"},
     *     summary="Get a specific news article",
     *     @OA\Parameter(name="slug", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (is_null($news)) {
            return $this->sendError('News article not found.');
        }

        return $this->sendResponse($news, 'News article retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/news/{slug}",
     *     tags={"News"},
     *     summary="Update a news article",
     *     @OA\Parameter(name="slug", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Article updated")
     * )
     */
    public function update(Request $request, $slug)
    {
        $news = News::where('slug', $slug)->first();

        if (is_null($news)) {
            return $this->sendError('News article not found.');
        }

        $news->update($request->all());

        return $this->sendResponse($news, 'News article updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/news/{slug}",
     *     tags={"News"},
     *     summary="Delete a news article",
     *     @OA\Parameter(name="slug", in="path", required=true, @OA\Schema(type="string")),
     *     @OA\Response(response="204", description="Article deleted")
     * )
     */
    public function destroy($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (is_null($news)) {
            return $this->sendError('News article not found.');
        }
        
        $news->delete();

        return $this->sendResponse([], 'News article deleted successfully.');
    }
}
