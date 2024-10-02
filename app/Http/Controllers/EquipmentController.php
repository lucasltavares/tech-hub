<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index() {
        $equipments = Equipments::all();

        return view('equipments.index')->with('equipments', $equipments);
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
