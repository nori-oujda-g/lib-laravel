<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // dd(Customer::all());
        // $customers = Customer::all();
        $customers = Customer::paginate(10);
        $size = '70px';
        return view('customer.customers', compact('customers', 'size'));
    }
    public function get(Request $request)
    {
        // 1rere methode:
        // $customer = Customer::find($request->id);
        // if (empty($customer))
        //     return abort(404);
        // 2eme methode:
        $customer = Customer::findOrFail($request->id);

        return view('customer.customer', compact('customer'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);
        // $customer =
        Customer::create($request->post());
        // Customer::create($request->all());
        // Customer::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'image' => $request->image,
        //     'bio' => $request->bio
        // ]);
        return redirect()->route('customers');
        // ->with('success', '');
    }
}
