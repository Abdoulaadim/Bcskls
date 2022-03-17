<?php

namespace App\Http\Controllers;

use App\Models\Fax;
use Illuminate\Http\Request;

class FaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fax = Fax::all();
        return view('user.fax.fax', compact('fax'));
    }

    public function search(Request $request)
    {
        //
        if($request->ajax())
        {
            $output="";
            $fax = Fax::selectRaw('*')
            ->where('numfax','LIKE','%'.$request->search."%")
            ->orWhere('telefax', 'LIKE', '%' . $request->search . "%")
            ->orWhere('telephone','LIKE', '%' . $request->search . "%")
            ->orWhere('emetteur', 'LIKE', '%' . $request->search . "%")
            ->orWhere('recepteur','LIKE', '%' . $request->search . "%")
            ->orWhere('datefax','LIKE', '%' . $request->search . "%")
            ->get();
            if($fax)
            {
                foreach($fax as $data){
                    $output.='<tr>'.
                     '<td class="px-6 py-4 ">'. $data->numfax .'</td>'.
                      '<td class="px-6 py-4 ">'. $data->telefax .'</td>'.
                     '<td class="px-6 py-4 ">'.$data->telephone.'</td>'.
                    '<td class="px-6 py-4 ">'. $data->emetteur.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->recepteur.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->datefax.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->objet.'</td>'.
                     '<td class="px-6 py-4 ">'. $data->description.'</td>'.
                     '<td class="px-6 py-4 flex justify-center">'.
                       
                                '<a href="modifierfax/'.$data->id.'">'.
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
            
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'numfax'=>'required',
            'telefax'=>'required',
            'telephone'=>'required',
            'emetteur'=>'required',
            'recepteur'=>'required',
            'datefax'=>'required',
            'objet'=>'required',
            'description'=>'required',
            ]);
    
            $fax = new Fax;
            if($request->file()) {


                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

                $fax->numfax = $request->get('numfax');
                $fax->telefax = $request->get('telefax');
                $fax->telephone = $request->get('telephone');
                $fax->emetteur = $request->get('emetteur');
                $fax->recepteur = $request->get('recepteur');
                $fax->datefax = $request->get('datefax');
                $fax->objet = $request->get('objet');
                $fax->description = $request->get('description');


                $fax->name = time().'_'.$request->file->getClientOriginalName();
                $fax->file_path = '/storage/' . $filePath;
        
                $fax->save();
    
                return redirect('/fax')
                ->with('success','A été ajouter avec succès ')
                ->with('file', $fileName);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function show(Fax $fax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fax = Fax::find($id);
        return view('user.fax.modifierfax', compact('fax'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
         
            'numfax'=>'required',
            'telefax'=>'required',
            'telephone'=>'required',
            'emetteur'=>'required',
            'recepteur'=>'required',
            'datefax'=>'required',
            'objet'=>'required',
            'description'=>'required',
           
        ]);

         $fax = fax::find($id);

         


            
         

            $fax->numfax = $request->get('numfax');
            $fax->telefax = $request->get('telefax');
            $fax->telephone = $request->get('telephone');
            $fax->emetteur = $request->get('emetteur');
            $fax->recepteur = $request->get('recepteur');
            $fax->datefax = $request->get('datefax');
            $fax->objet = $request->get('objet');
            $fax->description = $request->get('description');
          
    
            $fax->save();

            return redirect('/fax')
            ->with('success','A été ajouter avec succès ');
            // ->with('file', $fileName);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Fax::find($id)->delete();
        return back()->with('success','la suppression a été effectuée avec succès');
    }
}
