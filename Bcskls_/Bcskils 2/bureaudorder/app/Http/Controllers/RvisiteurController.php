<?php

namespace App\Http\Controllers;

use App\Models\Rvisiteur;
use App\Models\Division;
use App\Models\Visiteur;
use Illuminate\Http\Request;

class RvisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
    }

    public function rvisiteur()
    {
     
        $lastOne =  Visiteur ::all()->last();
        $division = Division::all();
        return view('user.rvisiteur.ajouterrvisiteur', compact('lastOne','division'));
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
            
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'division'=>'required',
            'service'=>'required',
            'objet'=>'required',
            'description'=>'required',
            'id_visiteur'=>'required',
            ]);
    
            $rvisiteur = new Rvisiteur;
            if($request->file()) {


                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');


                $rvisiteur->division = $request->get('division');
                $rvisiteur->service = $request->get('service');
                $rvisiteur->objet = $request->get('objet');
                $rvisiteur->description = $request->get('description');
                $rvisiteur->id_visiteur = $request->get('id_visiteur');
                $rvisiteur->name = time().'_'.$request->file->getClientOriginalName();
                $rvisiteur->file_path = '/storage/' . $filePath;
                $rvisiteur->id_visiteur = $request->get('id_visiteur');
                $rvisiteur->save();
    
                return redirect('/visiteur')
                ->with('success','A été ajouter avec succès ')
                ->with('file', $fileName);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rvisiteur  $rvisiteur
     * @return \Illuminate\Http\Response
     */
    public function show(Rvisiteur $rvisiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rvisiteur  $rvisiteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Rvisiteur $rvisiteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rvisiteur  $rvisiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rvisiteur $rvisiteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rvisiteur  $rvisiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rvisiteur $rvisiteur)
    {
        //
    }
}
