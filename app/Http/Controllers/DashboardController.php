<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Events;
use App\Models\Equipments;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customers::count();
        $events = Events::count();
        $equipments = Equipments::count();

        return view('dashboard', compact('customers', 'events', 'equipments'));
    }
}
