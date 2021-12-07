<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\InterestedUser;
use App\Notifications\SendReminderForEventNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // interested or not

    public function interested(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $request->validate([
            'status' => 'required',
            'event_id' => 'required' 
        ]);
        
        $request->merge([
            'user_id' => $user->id
        ]);
        // $user->notify(new SendReminderForEventNotification(Event::find($request->event_id)));
        InterestedUser::create($request->all());
        if($request->status == 1){
            return [
                'status' => 200,
                'message' => __('messages.interested'),
                'data' => '',
            ];
        }

        return [
            'status' => 200,
            'message' => __('messages.notInterested'),
            'data' => '',
        ];
    }
}
