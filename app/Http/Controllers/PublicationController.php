<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Services\AccessControl;
class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $publications = Publication::all();
        $publications = Publication::latest()->get();// afficher en ordre décroissant .
        return view('publication.publications', compact('publications'));

    }
    public function all()
    {
        // $publications = Publication::all();
        $publications = Publication::latest()->get();// afficher en ordre décroissant .
        return view('publication.all', compact('publications'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        // on doit générer un request pour valider les données:
        //      php artisan make:Request PublicationRequest
        $validate = $request->validated();
        if ($request->hasFile('image'))
            $validate['image'] = $request->file('image')->store('image', 'public');
        else
            $validate['image'] = '';
        $validate['customer_id'] = Auth::guard('customer')->user()->id;
        // dd($validate);
        Publication::create($validate);
        return redirect()->route('publications.index')->with('success', 'publication successfully inserted');
        // dd($validation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        // 1ere methode:
        // if (Auth::guard('customer')->user()->id != $publication->customer_id)
        //     // return redirect()->route('home');
        //     abort(403);
        // else
        // return view('publication.edit', compact('publication'));
        // dd(Gate::allows('optimise-publication', $publication));
        AccessControl::AccessPub($publication);
        // AccessControl::AccessPub($publication);
        return view('publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        AccessControl::AccessPub($publication);
        $validate = $request->validated();
        if ($request->hasFile('image'))
            $validate['image'] = $request->file('image')->store('image', 'public');
        // dd($validate);
        $publication->fill($validate)->save();
        return redirect()->route('publications.index')->with('success', 'publication successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        AccessControl::AccessPub($publication);
        // dd($publication);
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'successful delete 🤓');
    }

}
