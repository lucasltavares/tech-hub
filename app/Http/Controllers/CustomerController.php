<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Carbon\Carbon;

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
       $customer = Customers::create($request->all());

       $customer->register_date = Carbon::now();
       $customer->save();

        return redirect()->route('customers');
    }
}
