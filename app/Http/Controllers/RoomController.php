<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Events;

class RoomController extends Controller
{
    public function index($event_id)
    {
        $event = Events::find($event_id);

        $rooms = $event->rooms()->with('equipments')->get();

        return view('rooms.index')
            ->with('event', $event)
            ->with('rooms', $rooms);
    }

}
