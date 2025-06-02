<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerForUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    private const CACHE_KEY = 'api_customers';
    // 1rere methode :
    public function index()
    {
        // return Customer::paginate(5);
        // http://127.0.0.1:8000/api/customers?page=3
        // return Customer::all();
        // return CustomerResource::collection(Customer::withTrashed()->get());
        $customers = Cache::remember(self::CACHE_KEY, 10, function () {
            return CustomerResource::collection(Customer::withTrashed()->get());
        });
        return $customers;
        // return Customer::withTrashed()->get(); // pour afficher même les elements supprimées 
        // le rendu sera dans ce lien: http://127.0.0.1:8000/api/customers
    }
    public function querybuilder()
    {
        // le methode query builder est la methode classique qu'on travail loin du mappage de l'ORM .
        // sql: select * from customers;
        $customers = DB::table('customers')->get();
        // sql: select * from customers where name="mimoune";
        $customers = DB::table('customers')->where('name', 'mimoune')->get();
        $customers = DB::table('customers')->where('name', 'mimoune')->first();
        // ->first() : charge un seul element , ->get() : charge p+ieur elements .
        // sql: select id,name,email from customers;
        $customers = DB::table('customers')->select('id', 'name', 'email')->get();
        // sql: select id,name,email from customers where name like %mimoune%;
        $customers = DB::table('customers')
            ->select('id', 'name', 'email')
            ->where('name', 'like', '%mimoune%')
            ->get();
        // sql: select id,name,email from customers where id>190;
        $customers = DB::table('customers')
            ->select('id', 'name', 'email')
            ->where('id', '>', 190)
            ->get();
        // sql: select id,name,email from customers order by id desc
        $customers = DB::table('customers')
            ->select('id', 'name', 'email')
            ->orderBy('id', 'desc')
            ->get();
        // sql: select customers.name,customers.email,publications.title,publications.body from publications INNER JOIN customers on publications.customer_id=customers.id;
        $customers = DB::table('publications')
            ->join('customers', 'publications.customer_id', '=', 'customers.id')
            ->select('customers.name', 'customers.email', 'publications.title', 'publications.body')
            ->get();
        $customers = DB::table('customers')
            ->select('id', 'name', 'email', 'created_at')
            ->where('created_at', '>', date('Y-m-d', strtotime('2025-06-01')))
            ->get();
        // ou encore plus propre:
        $customers = DB::table('customers')
            ->select('id', 'name', 'email', 'created_at')
            ->where('created_at', '>', '2025-06-01')
            ->get();
        // les agregateurs : max , min , sum , count , avg (le moyenne)
        $customers = DB::table('customers')->max('id');
        // ->max('created_at');
        $customers = DB::table('customers')->count();
        $customers = DB::table('customers')->sum('id');
        $customers = DB::table('customers')->avg('id');
        // boolean
        $customers = DB::table('customers')->where('id', '=', 222)->exists();
        $customers = DB::table('customers')->whereIn('id', [2, 100, 200, 219])->get();
        $customers = DB::table('customers')->whereBetween('id', [100, 200])->get();
        // autre instr: orWhere ,whereNot('id', [100, 200])
        return $customers;
        // return response()->json(['message' => 'salam']);
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
        // Cache::forget(self::CACHE_KEY); //pour supprimer le cache 
        // Cache::delete(self::CACHE_KEY); //pour supprimer le cache 
        return Customer::create($validate);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
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
