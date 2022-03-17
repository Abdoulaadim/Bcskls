<?php

namespace App\Http\Controllers;

use App\Models\Ivisiteur;
use App\Models\Visiteur;
use App\Models\Division;
use Illuminate\Http\Request;

class IvisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ivisiteur()
    {
     
        $lastOne =  Visiteur ::all()->last();
        $division = Division::all();
        return view('user.ivisiteur.ajouterivisiteur', compact('lastOne','division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'division'=>'required',
            'service'=>'required',
            'type'=>'required',
            'description'=>'required',
            'id_visiteur'=>'required',
          
        ]);

        $ivisiteur = new Ivisiteur([
            'division' => $request->get('division'),
            'service' => $request->get('service'),
            'type' => $request->get('type'),
            'description' => $request->get('description'),
            'id_visiteur' => $request->get('id_visiteur'),

        ]);
        $ivisiteur->save();
        return redirect('/visiteur')->with('success', ' A été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ivisiteur  $ivisiteur
     * @return \Illuminate\Http\Response
     */
    public function show(Ivisiteur $ivisiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ivisiteur  $ivisiteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Ivisiteur $ivisiteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ivisiteur  $ivisiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ivisiteur $ivisiteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ivisiteur  $ivisiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ivisiteur $ivisiteur)
    {
        //
    }
}
