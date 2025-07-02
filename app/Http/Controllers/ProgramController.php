<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class ProgramController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/programs",
     *     tags={"Programs"},
     *     summary="Get a list of programs",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $programs = Program::all();
        return $this->sendResponse($programs, 'Programs retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/programs",
     *     tags={"Programs"},
     *     summary="Create a new program",
     *     @OA\Response(response="201", description="Program created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'full_description' => 'required',
            'category' => 'required',
            'duration' => 'required',
            'location' => 'required',
            'cost' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $program = Program::create($request->all());

        return $this->sendResponse($program, 'Program created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/programs/{id}",
     *     tags={"Programs"},
     *     summary="Get a specific program",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Program $program)
    {
        return $this->sendResponse($program, 'Program retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/programs/{id}",
     *     tags={"Programs"},
     *     summary="Update a program",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Program updated")
     * )
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->all());

        return $this->sendResponse($program, 'Program updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/programs/{id}",
     *     tags={"Programs"},
     *     summary="Delete a program",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Program deleted")
     * )
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return $this->sendResponse([], 'Program deleted successfully.');
    }
}
