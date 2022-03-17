<?php

namespace App\Http\Controllers;

use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$motif = DB::select('select * from motifs ');
        $motif = Motif::all();
        return view('admin.donnee.motif.motif', compact('motif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
                'motif'=>'required',
            ]);
    
            $motif = new Motif([
                'motif' => $request->get('motif'),
            ]);
            $motif->save();
            return redirect('/motif')->with('success', 'A été ajouter avec success');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function show(Motif $motif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motif = Motif::find($id);
        return view('admin/donnee/motif/modifiermotif', compact('motif'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
       
            $request->validate([
                'motif'=>'required',
               
            ]);
    
            $motif = Motif::find($id);
            $motif->motif =  $request->get('motif');
            $motif->save();
    
            return redirect('/motif')->with('success', 'la modification a été effectuée avec succès');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Motif::find($id)->delete();
  
        return back()->with('success','la suppression a été effectuée avec succès');
    }
}
