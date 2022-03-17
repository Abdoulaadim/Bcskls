<?php

namespace App\Http\Controllers;

use App\Models\telephone;
use Illuminate\Http\Request;

class TelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telephone = Telephone::all();
        return view('user.telephone.telephone', compact('telephone'));
    }

    public function search(Request $request)
    {
        //
        if($request->ajax())
        {
            $output="";
            $telephone = Telephone::selectRaw('*')
            ->where('nom','LIKE','%'.$request->search."%")
            ->orWhere('prenom', 'LIKE', '%' . $request->search . "%")
            ->orWhere('telephone','LIKE', '%' . $request->search . "%")
            ->get();
            if($telephone)
            {
                foreach($telephone as $data){
                    $output.='<tr>'.
                     '<td class="px-6 py-4 ">'. $data->nom .'</td>'.
                      '<td class="px-6 py-4 ">'. $data->prenom .'</td>'.
                     '<td class="px-6 py-4 ">'.$data->telephone.'</td>'.
                            '<td class="px-6 py-4 ">'.
                                $data->type
                            .'</td>'.
                            '<td class="px-6 py-4 ">'.
                                $data->description
                            .'</td>'.
                            '<td class="px-6 py-4 flex justify-center">'.
                       
                                '<a href="modifiertelephone/'.$data->id.'">'.
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required',
            'type'=>'required',
            'description'=>'required',

        ]);

        $telephone = new telephone([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('telephone'),
            'type' => $request->get('type'),
            'description' => $request->get('description'),
        ]);
        $telephone->save();
        return redirect('/telephone')->with('success', 'A été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function show(telephone $telephone)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telephone = Telephone::find($id);
        return view('user.telephone.modifiertelephone', compact('telephone'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required',
            'type'=>'required',
            'description'=>'required',
           
        ]);

        $telephone = telephone::find($id);
        $telephone->nom =  $request->get('nom');
        $telephone->prenom =  $request->get('prenom');
        $telephone->telephone =  $request->get('telephone');
        $telephone->type =  $request->get('type');
        $telephone->description =  $request->get('description');


        $telephone->save();

        return redirect('/telephone')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        telephone::find($id)->delete();
  
        return back()->with('success','la suppression a été effectuée avec succès');
    }
}
