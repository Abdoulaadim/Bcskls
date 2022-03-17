<?php

namespace App\Http\Controllers;

use App\Models\S_Visiteur;
use App\Models\Visiteur;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SVisiteurController extends Controller
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

    public function svisiteur()
    {
        //$id = $request->input('id_division');
        //$id = $request->get('id_division');
       
        //return view("visiteursimple.detailsimple",['visiteur_simple'=>$visiteur_simple]);
        $lastOne =  Visiteur ::all()->last();

        $division = Division::all();
        //return view('user.svisiteur.ajoutersvisiteur', compact('division'));
       // $lastOne = DB::table('visiteurs')->latest('id')->first();
        return view('user.svisiteur.ajoutersvisiteur', compact('lastOne','division'));
    }

    public function selectservice($id)
    {
        $service =DB::table('divisions')      
        ->join('services', 'divisions.id','=','services.id_division')
        ->where('divisions.nomdivision','=', $id)
        ->select('*')->get();
        return response()->json($service);
        //return view('user.svisiteur.ajoutersvisiteur', compact('lastOne','division','service'));
        //return view('user.svisiteur.ajoutersvisiteur');
    }


    public function selectemployee($id)
    {
        $employee =DB::table('services')      
        ->join('employees', 'services.id','=','employees.id_service')
        ->where('services.nomservice','=', $id)
        ->select('*')->get();
        return response()->json($employee);

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
            'employee'=>'required',
            'description'=>'required',
            'id_visiteur'=>'required',
          
        ]);

        $svisiteur = new S_Visiteur([
            'division' => $request->get('division'),
            'service' => $request->get('service'),
            'employee' => $request->get('employee'),
            'description' => $request->get('description'),
            'id_visiteur' => $request->get('id_visiteur'),

        ]);
        $svisiteur->save();
        return redirect('/visiteur')->with('success', ' A été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\S_Visiteur  $s_Visiteur
     * @return \Illuminate\Http\Response
     */
    public function show(S_Visiteur $s_Visiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\S_Visiteur  $s_Visiteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $svisiteur = S_Visiteur::find($id);
        return view('user.visiteur.modifiersvisiteur', compact('svisiteur'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\S_Visiteur  $s_Visiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'division'=>'required',
            'service'=>'required',
            'employee'=>'required',
            'description'=>'required',
            'id_visiteur'=>'required',
           
        ]);

        $svisiteur = S_Visiteur::find($id);
        $svisiteur->division =  $request->get('division');
        $svisiteur->service =  $request->get('service');
        $svisiteur->employee =  $request->get('employee');
        $svisiteur->description =  $request->get('description');
        $svisiteur->id_visiteur =  $request->get('id_visiteur');
   
      


        $svisiteur->save();

        return redirect('/visiteur')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\S_Visiteur  $s_Visiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        S_Visiteur::find($id)->delete();
        return back()->with('success','la suppression a été effectuée avec succès');
    }
}
