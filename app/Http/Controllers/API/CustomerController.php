<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerForUpdateRequest;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    // 1rere methode :
    public function index()
    {
        // return Customer::paginate(5);
        // http://127.0.0.1:8000/api/customers?page=3
        return Customer::all();
        // return Customer::withTrashed()->get(); // pour afficher même les elements supprimées 
        // le rendu sera dans ce lien: http://127.0.0.1:8000/api/customers
    }
    // 2e methode :
    // public function index():Collection
    // {
    //     return Customer::all();
    //     // le rendu sera dans ce lien: http://127.0.0.1:8000/api/customers
    // }
    // 3e methode :
// public function index()
//     {
//         return response()->json(Customer::all());
//         // le rendu sera dans ce lien: http://127.0.0.1:8000/api/customers
//     }

    public function store(Customer $customer, Request $request)
    {
        $validate = $request->all();
        $validate['password'] = Hash::make($request->password);
        // dd($request->all());
        return Customer::create($validate);

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Customer $customer, CustomerForUpdateRequest $request)
    public function update(Customer $customer, Request $request)
    {
        // dd($request->all());
        // $validate = $request->validated();
        $validate = $request->all();
        $customer->fill($validate)->save();
        return response()->json([
            'message' => 'the customer is well updated !',
            'updated_object' => $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        // dd($customer);
        return response()->json([
            'message' => 'the customer is well deleted !',
            'deleted_object' => $customer
        ]);
    }
}
