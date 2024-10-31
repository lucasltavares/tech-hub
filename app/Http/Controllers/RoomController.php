<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Events;

class RoomController extends Controller
{
    public function index($event_id)
    {
        $rooms = Rooms::where('events_id', $event_id)->get();

        $event = Events::find($event_id);

        return view('rooms.index')->with('rooms', $rooms)->with('event', $event);
    }
}
