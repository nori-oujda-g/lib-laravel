<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerForUpdateRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use \Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

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
    public function store(CustomerRequest $request)
    {
        //  formFields
        // dans CustomerRequest on a mis tous les critères de validate
        $validate = $request->validated();
        if ($request->hasFile('avatar'))
            $validate['avatar'] = $request->file('avatar')->store('image', 'public');
        // $validate['avatar'] = $request->file('avatar')->storeAs(
        //     'image',
        //     '_' . $validate['email'] . '.png',
        //     'public'
        // );
        $validate['password'] = Hash::make($request->password);
        // dd($validate);
        Customer::create($validate);
        return redirect()->route('customers')->with('success', 'successful insertion');
    }
    public function store3(Request $request)
    {
        $validate = $request->validate([
            // between:3,100 | date | email | url | 
            'name' => 'required|min:3|max:100|unique:customers',
            'email' => 'required|email|unique:customers',
            'image' => 'required|url',
            'password' => 'required|confirmed|min:3|max:100',
        ]);
        $validate['password'] = Hash::make($request->password);
        Customer::create($validate);
        // la premier solution pour l'insrtion:        
        // Customer::create($request->post());
        // les autres solutions :
        // Customer::create($request->all());
        // Customer::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'image' => $request->image,
        //     'bio' => $request->bio
        // ]);
        return redirect()->route('customers')->with('success', 'successful insertion');
    }
    public function store2(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                // between:3,100 | date | email | url | 
                'name' => 'required|min:3|max:10|unique:customers',
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
    public function login()
    {
        return view('customer.login');
    }
    public function connect(Request $request): RedirectResponse
    {
        $credentials = ['email' => $request->login, 'password' => $request->password];
        // dd(Auth::guard('customer')->attempt($credentials));
        //se connecter directement vas faire des problemes , regarder le fichier: configuration-auth.md pour voir la configuration necessaire pour authentifiquation. 
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'you are well connected 😊');
        } else {
            return back()->withErrors([
                'login' => 'email or password are incorrect'
            ])->onlyInput('login');
        }
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', 'you are well deconnected 🙄');
    }
    public function delete(Customer $customer)
    {
        return $customer->delete() ?
            redirect()->route('customers')->with('success', 'successful delete 🤓') :
            redirect()->route('customers')->with('error', 'error delete 🥵');
    }
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }
    public function update(Customer $customer, CustomerForUpdateRequest $request)
    {
        $validate = $request->validated();
        if ($request->hasFile('avatar'))
            $validate['avatar'] = $request->file('avatar')->store('image', 'public');
        // $validate['avatar'] = $request->file('avatar')->storeAs(
        //     'image',
        //     '_' . $validate['email'] . '.png',
        //     'public'
        // );
        $customer->fill($validate)->save();
        // dd($customer);
        // dd($request->validated());
        return redirect()->route('customers')->with('success', 'successful update 🤓');
    }
}
