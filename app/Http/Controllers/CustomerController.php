<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customers::all();

        return view('customers.index')->with('customers', $customers);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
       Customers::create($request->all());

        return redirect()->route('customers');
    }
}
