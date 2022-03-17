<?php

namespace App\Http\Controllers;

use App\Models\Centrant;
use App\Models\Division;
use Illuminate\Http\Request;

class CentrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centrant = Centrant::all();
        return view('user.centrant.centrant', compact('centrant'));
    }

    public function search(Request $request)
    {
        //
        if($request->ajax())
        {
            $output="";
            $centrant = Centrant::selectRaw('*')
            ->where('created_at','LIKE','%'.$request->search."%")
            ->orWhere('reference', 'LIKE', '%' . $request->search . "%")
            ->orWhere('depart','LIKE', '%' . $request->search . "%")
            ->orWhere('expiditeur', 'LIKE', '%' . $request->search . "%")
            ->orWhere('etat','LIKE', '%' . $request->search . "%")
            ->orWhere('objet','LIKE', '%' . $request->search . "%")
            ->get();
            if($centrant)
            {
                foreach($centrant as $data){
                    $output.='<tr>'.
                    '<td class="px-6 py-4 ">'. $data->created_at .'</td>'.
                     '<td class="px-6 py-4 ">'. $data->reference .'</td>'.
                      '<td class="px-6 py-4 ">'. $data->objet.'</td>'.
                     '<td class="px-6 py-4 ">'.$data->type.'</td>'.
                    '<td class="px-6 py-4 ">'. $data->depart.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->expiditeur.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->division.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->service.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->employee.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->etat.'</td>'.
                     '<td class="px-6 py-4 flex justify-center">'.
                       
                                '<a href="modifiercentrant/'.$data->id.'">'.
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
        return view('user.centrant.ajoutercentrant', compact('division'));
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
            'division'=>'required',
            'service'=>'required',
            'employee'=>'required',
            'etat'=>'required',
          
        ]);

        $centrant = new Centrant([
            'reference' => $request->get('reference'),
            'objet' => $request->get('objet'),
            'type' => $request->get('type'),
            'depart' => $request->get('depart'),
            'expiditeur' => $request->get('expiditeur'),
            'division' => $request->get('division'),
            'service' => $request->get('service'),
            'employee' => $request->get('employee'),
            'etat' => $request->get('etat'),
           

        ]);
        $centrant->save();
        return redirect('/centrant')->with('success', ' A été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\centrant  $centrant
     * @return \Illuminate\Http\Response
     */
    public function show(centrant $centrant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\centrant  $centrant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = division::all();
        $centrant = Centrant::find($id);
        return view('user.centrant.modifiercentrant', compact('centrant','division'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\centrant  $centrant
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
            'division'=>'required',
            'service'=>'required',
            'employee'=>'required',
            'etat'=>'required',
          
        ]);

        $centrant = Centrant::find($id);
        $centrant->reference =  $request->get('reference');
        $centrant->objet =  $request->get('objet');
        $centrant->type =  $request->get('type');
        $centrant->depart =  $request->get('depart');
        $centrant->expiditeur =  $request->get('expiditeur');
        $centrant->division =  $request->get('division');
        $centrant->service =  $request->get('service');
        $centrant->employee =  $request->get('employee');
        $centrant->etat =  $request->get('etat');
   
      


        $centrant->save();

        return redirect('/centrant')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\centrant  $centrant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        centrant::find($id)->delete();
        return back()->with('success','la suppression a été effectuée avec succès');
    }

}
