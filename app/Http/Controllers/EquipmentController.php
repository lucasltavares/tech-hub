<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Equipments;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index() {
        $equipments = Equipments::with('Rooms')->get();

        $events = Events::where('is_active', 1)->get();

        return view('equipments.index')
            ->with('equipments', $equipments)
            ->with('events', $events);
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(Request $request)
    {
       Equipments::create($request->all());

        return redirect()->route('equipments');
    }
}
