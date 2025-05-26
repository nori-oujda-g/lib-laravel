<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use \Exception;

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
    public function get2(Customer $customer)
    {
        // cette methode appelé : Route model binding
        return view('customer.customer', compact('customer'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'name' => 'required',
            ]);
            // la premier solution pour l'insrtion:
            Customer::create($request->post());
            // les autres solutions :
            // Customer::create($request->all());
            // Customer::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'image' => $request->image,
            //     'bio' => $request->bio
            // ]);
            return redirect()->route('customers')->with('success', 'successful insertion');
            // ->with('error', 'insertion error !');
            // ->with('success', ''): c'est un flashbag pour afficher un message après l'ajout
        } catch (Exception $e) {
            return redirect()->route('customers')->with('error', 'insertion error !');
            // echo 'Une erreur est survenue : ' . $e->getMessage();
        }

    }
    public function rediriger()
    {
        // les redirections:
        // redirect('/test');
        // redirect()->route('test'); ==ou==> to_route('test');
        // redirect()->route('vars',['id'=>22]); redirection avec parametre .
        // redirect()->action(...);
        // back('/test');  retour à la page precedente .
        // back('/customer')->withInput();  retour à la page precedente avec le formulaire remplie .
        return redirect('/test');
    }
}
