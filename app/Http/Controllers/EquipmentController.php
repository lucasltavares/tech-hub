<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Equipments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index() {
        $equipments = Equipments::with('Rooms')->get();

        if ($equipments->isEmpty()) {
            $equipments = null;
        }

        $events = Events::where('is_active', 1)->get();

        return view('equipments.index')
            ->with('equipments', $equipments)
            ->with('events', $events);
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(Request $request): RedirectResponse
    {
       Equipments::create($request->all());

        return redirect()->route('equipments');
    }

    public function update(Request $request, int $id): RedirectResponse
    {

        //dd($request->all());
        $equipment = Equipments::find($id);

        if (!$equipment) {
           abort(404);
        }

        $equipment->update($request->all());

        return redirect()->route('equipments');
    }
}
