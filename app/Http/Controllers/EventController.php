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
        Events::create($data);
        return redirect('/events');
    }
}
