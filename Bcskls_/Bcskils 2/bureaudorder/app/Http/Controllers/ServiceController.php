<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Division;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('admin.donnee.service.service', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slectdivision()
    {
        $division = Division::all();
        return view('admin.donnee.service.ajouterservice', compact('division'));
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
            'nomservice'=>'required',
            'id_division'=>'required',
        ]);

        $service = new Service([
            'nomservice' => $request->get('nomservice'),
            'id_division' => $request->get('id_division'),
        ]);
        $service->save();
        return redirect('/service')->with('success', 'A été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $division = Division::all();
        return view('admin/donnee/service/modifierservice', compact('service','division'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomservice'=>'required',
            'id_division'=>'required',
           
        ]);

        $service = Service::find($id);
        $service->nomservice =  $request->get('nomservice');
        $service->id_division =  $request->get('id_division');

        $service->save();

        return redirect('/service')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
  
        return back()->with('success','la suppression a été effectuée avec succès');
    }
}
