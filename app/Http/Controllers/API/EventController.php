<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        return [
            'status' => 200,
            'message' => __('messages.events'),
            'data' => $events,
        ];
    }

    public function eventsByCommunity($id)
    {
        $events = Event::where('community_id', $id)->exists();
        if ($events) {
            return [
                'status' => 200,
                'message' => __('messages.events'),
                'data' => Event::where('community_id', $id)->get(),
            ];
        }
        return [
            'status' => 404,
            'message' => __('messages.events.notfound'),
            'data' => $events,
        ];
    }
}
