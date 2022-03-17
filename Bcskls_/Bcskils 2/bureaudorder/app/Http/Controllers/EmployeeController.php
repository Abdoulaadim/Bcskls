<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\service;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('admin.donnee.employee.employee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectservice()
    {
        $service = Service::all();
        return view('admin.donnee.employee.ajouteremployee', compact('service'));
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
            'nomemployee'=>'required',
            'prenomemployee'=>'required',
            'id_service'=>'required',
        ]);

        $employee = new Employee([
            'nomemployee' => $request->get('nomemployee'),
            'prenomemployee' => $request->get('prenomemployee'),
            'id_service' => $request->get('id_service'),
        ]);
        $employee->save();
        return redirect('/employee')->with('success', 'A été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $service = Service::all();
        return view('admin/donnee/employee/modifieremployee', compact('employee','service'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomemployee'=>'required',
            'prenomemployee'=>'required',
            'id_service'=>'required',
           
        ]);

        $employee = Employee::find($id);
        $employee->nomemployee =  $request->get('nomemployee');
        $employee->prenomemployee =  $request->get('prenomemployee');
        $employee->id_service =  $request->get('id_service');

        $employee->save();

        return redirect('/employee')->with('success', 'la modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
  
        return back()->with('success','la suppression a été effectuée avec succès');
    }
}
