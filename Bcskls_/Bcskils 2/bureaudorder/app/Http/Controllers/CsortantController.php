<?php

namespace App\Http\Controllers;

use App\Models\Csortant;
use App\Models\division;
use Illuminate\Http\Request;

class CsortantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $csortant = Csortant::all();
        return view('user.csortant.csortant', compact('csortant'));
    }


    public function search(Request $request)
    {
        //
        if($request->ajax())
        {
            $output="";
            $csortant = Csortant::selectRaw('*')
            ->where('reference','LIKE','%'.$request->search."%")
            ->orWhere('objet', 'LIKE', '%' . $request->search . "%")
            ->orWhere('depart','LIKE', '%' . $request->search . "%")
            ->orWhere('expiditeur', 'LIKE', '%' . $request->search . "%")
            ->orWhere('destinataire','LIKE', '%' . $request->search . "%")
            ->orWhere('etat','LIKE', '%' . $request->search . "%")
            ->get();
            if($csortant)
            {
                foreach($csortant as $data){
                    $output.='<tr>'.
                    '<td class="px-6 py-4 ">'. $data->created_at .'</td>'.
                     '<td class="px-6 py-4 ">'. $data->reference .'</td>'.
                      '<td class="px-6 py-4 ">'. $data->objet.'</td>'.
                     '<td class="px-6 py-4 ">'.$data->type.'</td>'.
                    '<td class="px-6 py-4 ">'. $data->depart.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->expiditeur.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->destinataire.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->division.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->service.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->employee.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->etat.'</td>'.
                     '<td class="px-6 py-4 flex justify-center">'.
                       
                                '<a href="modifiercsortant/'.$data->id.'">'.
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


    public function division()
    {
        
        $division = division::all();
        return view('user.csortant.ajoutercsortant', compact('division'));
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
            'reference'=>'required',
            'objet'=>'required',
            'type'=>'required',
            'depart'=>'required',
            'expiditeur'=>'required',
            'destinataire'=>'required',
            'division'=>'required',
            'service'=>'required',
            'employee'=>'required',
            'etat'=>'required',
          
        ]);

        $csortant = new Csortant([
            'reference' => $request->get('reference'),
            'objet' => $request->get('objet'),
            'type' => $request->get('type'),
            'depart' => $request->get('depart'),
            'expiditeur' => $request->get('expiditeur'),
            'destinataire' => $request->get('destinataire'),
            'division' => $request->get('division'),
            'service' => $request->get('service'),
            'employee' => $request->get('employee'),
            'etat' => $request->get('etat'),
           

        ]);
        $csortant->save();
        return redirect('/csortant')->with('success', ' A été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Csortant  $csortant
     * @return \Illuminate\Http\Response
     */
    public function show(Csortant $csortant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Csortant  $csortant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = division::all();
        $csortant = Csortant::find($id);
        return view('user.csortant.modifiercsortant', compact('csortant','division'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Csortant  $csortant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference'=>'required',
            'objet'=>'required',
            'type'=>'required',
            'depart'=>'required',
            'expiditeur'=>'required',
            'destinataire'=>'required',
            'division'=>'required',
            'service'=>'required',
            'employee'=>'required',
            'etat'=>'required',
          
        ]);

        $csortant = Csortant::find($id);
        $csortant->reference =  $request->get('reference');
        $csortant->objet =  $request->get('objet');
        $csortant->type =  $request->get('type');
        $csortant->depart =  $request->get('depart');
        $csortant->expiditeur =  $request->get('expiditeur');
        $csortant->destinataire =  $request->get('destinataire');
        $csortant->division =  $request->get('division');
        $csortant->service =  $request->get('service');
        $csortant->employee =  $request->get('employee');
        $csortant->etat =  $request->get('etat');
   
      


        $csortant->save();

        return redirect('/csortant')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Csortant  $csortant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Csortant::find($id)->delete();
        return back()->with('success','la suppression a été effectuée avec succès');
    }

}
