<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::all();

        return view('events.index')->with('events', $events);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->id();

        $event = Events::create($data);

        for ($i = 1; $i <= $event->rooms; $i++) {
            $event->rooms()->create([
                'number' => $i,
                'description' => 'Sala ' . $i . ' de ' . $event->name,
            ]);
        }

        return redirect('/events');
    }

    public function getRooms(Events $eventId)   
    {
        return response()->json($eventId->rooms()->get());  
    }
}
