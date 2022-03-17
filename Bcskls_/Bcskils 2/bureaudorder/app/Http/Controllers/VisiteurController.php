<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;


class VisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visiteur = Visiteur::all();
        return view('user.visiteur.visiteur', compact('visiteur'));
    }

    
    public function search(Request $request)
    {
        //
        if($request->ajax())
        {
            $output="";
            $visiteur = Visiteur::selectRaw('*')
            ->where('cin','LIKE','%'.$request->search."%")
            ->orWhere('nomvisiteur', 'LIKE', '%' . $request->search . "%")
            ->orWhere('prenomvisiteur','LIKE', '%' . $request->search . "%")
            ->orWhere('adressevisiteur', 'LIKE', '%' . $request->search . "%")
            ->orWhere('mailvisiteur','LIKE', '%' . $request->search . "%")
            ->orWhere('telephone','LIKE', '%' . $request->search . "%")
            ->get();
            if($visiteur)
            {
                foreach($visiteur as $data){
                    $output.='<tr>'.
                    '<td class="px-6 py-4 ">'. $data->cin .'</td>'.
                     '<td class="px-6 py-4 ">'. $data->badge .'</td>'.
                      '<td class="px-6 py-4 ">'. $data->nomvisiteur.'</td>'.
                     '<td class="px-6 py-4 ">'.$data->prenomvisiteur.'</td>'.
                    '<td class="px-6 py-4 ">'. $data->adressevisiteur.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->mailvisiteur.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->telephone.'</td>'.
                     '<td class="px-6 py-4 flex justify-center">'.
                       
                                '<a href="modifiervisiteur/'.$data->id.'">'.
                                    '<img class="w-8 h-8 " src="'. asset("img/update.png").'"'.'class="w-12" />'.
                                '</a>'.
                           
                            '</td>'.
                            // '<td class="px-6 py-4  justify-center">'.
                            //    ' <form method="POST" action="'. route('telephone.delete', $data->id).' ">'.
                            //        '"'.@csrf.'"'.
                            //         '<input name="_method" type="hidden" value="DELETE">'.
                            //         '<button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete">'.
                            //             '<img class="w-8 h-8 " src="'. asset("img/delete.png").'"'. 'class="w-12" />'.
                            //         '</button>'.
                            //     '</form>'.
                            // '</td>'.
                    '</tr>';


                }
                return Response($output);
            }
        }

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
            'cin'=>'required',
            'badge'=>'required',
            'nomvisiteur'=>'required',
            'prenomvisiteur'=>'required',
            'adressevisiteur'=>'required',
            'mailvisiteur'=>'required',
            'telephone'=>'required',
        ]);

        $visiteur = new Visiteur([
            'cin' => $request->get('cin'),
            'badge' => $request->get('badge'),
            'nomvisiteur' => $request->get('nomvisiteur'),
            'prenomvisiteur' => $request->get('prenomvisiteur'),
            'adressevisiteur' => $request->get('adressevisiteur'),
            'mailvisiteur' => $request->get('mailvisiteur'),
            'telephone' => $request->get('telephone'),
        ]);
        $visiteur->save();
        return view('user.visiteur.typevisiteur')->with('success', 'A été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function show(Visiteur $visiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visiteur = Visiteur::find($id);
        return view('user.visiteur.modifiervisiteur', compact('visiteur'));  
    }

    public function searchse($id){
        $visiteur = Visiteur::find($id);
        return view('user.visiteur.searchse', compact('visiteur'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'cin'=>'required',
            'badge'=>'required',
            'nomvisiteur'=>'required',
            'prenomvisiteur'=>'required',
            'adressevisiteur'=>'required',
            'mailvisiteur'=>'required',
            'telephone'=>'required',
           
        ]);

        $visiteur = Visiteur::find($id);
        $visiteur->cin =  $request->get('cin');
        $visiteur->badge =  $request->get('badge');
        $visiteur->nomvisiteur =  $request->get('nomvisiteur');
        $visiteur->prenomvisiteur =  $request->get('prenomvisiteur');
        $visiteur->adressevisiteur =  $request->get('adressevisiteur');
        $visiteur->mailvisiteur =  $request->get('mailvisiteur');
        $visiteur->telephone =  $request->get('telephone');


        $visiteur->save();

        return redirect('/visiteur')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Visiteur::find($id)->delete();
        return back()->with('success','la suppression a été effectuée avec succès');
    }

 



}
