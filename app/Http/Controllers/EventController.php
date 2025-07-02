<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class EventController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/v1/events",
     *     tags={"Events"},
     *     summary="Get a list of events",
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function index()
    {
        $events = Event::all();
        return $this->sendResponse($events, 'Events retrieved successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/events",
     *     tags={"Events"},
     *     summary="Create a new event",
     *     @OA\Response(response="201", description="Event created")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'category' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $event = Event::create($request->all());

        return $this->sendResponse($event, 'Event created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/v1/events/{id}",
     *     tags={"Events"},
     *     summary="Get a specific event",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function show(Event $event)
    {
        return $this->sendResponse($event, 'Event retrieved successfully.');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/events/{id}",
     *     tags={"Events"},
     *     summary="Update an event",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Event updated")
     * )
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        return $this->sendResponse($event, 'Event updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/events/{id}",
     *     tags={"Events"},
     *     summary="Delete an event",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Event deleted")
     * )
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return $this->sendResponse([], 'Event deleted successfully.');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/events/{id}/register",
     *     tags={"Events"},
     *     summary="Register for an event",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successfully registered")
     * )
     */
    public function register(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        // Here you would typically handle the registration logic, 
        // such as creating a new registration record, sending a confirmation email, etc.
        // For now, we will just return a success message.

        return $this->sendResponse([], 'Successfully registered for the event.');
    }
}
