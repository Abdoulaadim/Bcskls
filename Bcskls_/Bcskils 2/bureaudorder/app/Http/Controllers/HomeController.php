<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Contracts\CreatesNewUsers;




class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'Admin') {
            return view('admin.donnee.menu');
        } else {
            return view('user.home');
        }
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
      $users = DB::select('select * from users ');
       // $xxx = User::all();
        return view('admin.donnee.user.affichageuser', compact('users'));
        
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
            'name' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'role' => 'required',
            'password' => 'required',
          
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email ' => $request->get('email'),
            'cin' => $request->get('cin'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password')),

        ]);
        $user->save();

        User::create($request->all());
        return redirect()->route('affichageuser')->with('message','visiteur created successfully.');
    }

}
