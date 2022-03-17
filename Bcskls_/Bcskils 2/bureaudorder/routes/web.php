<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\SVisiteurController;
use App\Http\Controllers\CsortantController;
use App\Http\Controllers\CentrantController;
use App\Http\Controllers\RvisiteurController;
use App\Http\Controllers\IvisiteurController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\FaxController;




use App\Models\Visiteur;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// 2 role user Admin
Route::get('Home', [HomeController::class,'index']);



//Menu donnee Admin
Route::get('/menu', function () {
    return view('admin/donnee/menu');
});

//affichage user 
Route::get('affichageuser', [HomeController::class,'show'])->name('affichageuser');
//afficahge page register
Route::get('/registerusers', function () {
    return view('admin/donnee/user/registeruser');
});
//create new user
Route::Post('registeruser', [HomeController::class,'store'])->name('createuser');

//_____________________________________________Motif_______________________________________//
//affichage motif
Route::get('motif', [MotifController::class,'index']);
//ajouter motif 
Route::Post('ajoutermotif', [MotifController::class,'store'])->name('ajoutermotifs');

//Route::get('motifajouter', [MotifController::class,'create'])->name('motifajouter');

//affichage form d'ajout motif
Route::get('/ajoutermotif', function () {
    return view('admin/donnee/motif/ajoutermotif');
});

// modifier motif 
Route::get('modifiermotif/{id}', [MotifController::class, 'edit']);
Route::put('motifupdate/{id}', [MotifController::class, 'update'])->name('motifupdate');

//supprimer motif 
Route::delete('motif/{id}', [MotifController::class, 'destroy'])->name('motif.delete');

//_____________________________________________Division_______________________________________//
//affichage division
Route::get('division', [DivisionController::class,'index']);
//ajouter division 
Route::Post('ajouterdivision', [DivisionController::class,'store'])->name('ajouterdivision');

//affichage form d'ajout division
Route::get('/ajouterdivision', function () {
    return view('admin/donnee/division/ajouterdivision');
});

// modifier division 
Route::get('modifierdivision/{id}', [DivisionController::class, 'edit']);
Route::put('motifdivision/{id}', [DivisionController::class, 'update'])->name('divisionupdate');

//supprimer division 
Route::delete('division/{id}', [DivisionController::class, 'destroy'])->name('division.delete');

//_____________________________________________Service_______________________________________//
//affichage service
Route::get('service', [ServiceController::class, 'index']);
//affichage form d'ajout service
Route::get('ajouterservice', [ServiceController::class, 'slectdivision']);
//ajouter service 
Route::Post('ajouterservice', [ServiceController::class,'store'])->name('ajouterservice');


// Route::get('/ajouterservice', function () {
//     return view('admin/donnee/service/ajouterservice');
// });

// modifier service 
Route::get('modifierservice/{id}', [ServiceController::class, 'edit']);
Route::put('motifservice/{id}', [ServiceController::class, 'update'])->name('serviceupdate');

//supprimer service 
Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.delete');


//_____________________________________________Employee_______________________________________//
//affichage employee
Route::get('employee', [EmployeeController::class, 'index']);
//affichage form d'ajout employee
Route::get('ajouteremployee', [EmployeeController::class, 'selectservice']);
//ajouter employee 
Route::Post('ajouteremployee', [EmployeeController::class,'store'])->name('ajouteremployee');


// Route::get('/ajouterservice', function () {
//     return view('admin/donnee/service/ajouterservice');
// });

// modifier employee 
Route::get('modifieremployee/{id}', [EmployeeController::class, 'edit']);
Route::put('modifieremployees/{id}', [EmployeeController::class, 'update'])->name('employeeupdate');

//supprimer employee 
Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');

//_____________________________________________Visiteur_______________________________________//
//affichage  visiteur
Route::get('visiteur', [VisiteurController::class, 'index']);

Route::get('searchvisiteur', [VisiteurController::class, 'search'])->name('searchvisiteur');


Route::get('/ajoutervisiteur', function () {
    return view('user.visiteur.ajoutervisiteur');
});
Route::Post('ajoutervisiteur', [VisiteurController::class,'store'])->name('ajoutervisiteur');

Route::get('modifiervisiteur/{id}', [VisiteurController::class, 'edit']);
Route::put('modifiervisiteur/{id}', [VisiteurController::class, 'update'])->name('visiteurupdate');

Route::delete('visiteur/{id}', [VisiteurController::class, 'destroy'])->name('visiteur.delete');

//_____________________________________________Visiteur_simple_______________________________________//

// Route::get('svisiteur', function () {
//     return view('user.svisiteur.ajoutersvisiteur');
// });

Route::get('svisiteur', [SVisiteurController::class,'svisiteur'])->name('svisiteur');

Route::get('service/{id}', [SVisiteurController::class,'selectservice'])->name('service');

Route::get('employee/{id}', [SVisiteurController::class,'selectemployee'])->name('employee');

Route::Post('ajoutersvisiteur', [SVisiteurController::class,'store'])->name('ajoutersvisiteur');

Route::get('modifiersvisiteur/{id}', [SVisiteurController::class, 'edit']);
Route::put('modifiersvisiteur/{id}', [SVisiteurController::class, 'update'])->name('svisiteurupdate');

Route::delete('svisiteur/{id}', [SVisiteurController::class, 'destroy'])->name('svisiteur.delete');
// Route::get('lastOne', [VisiteurController::class,'dernierelement'])->name('lastOne');


//_____________________________________________Courier sourtant_______________________________________//

Route::get('csortant', [CsortantController::class, 'index']);
Route::get('searchcsortant', [CsortantController::class, 'search'])->name('searchcsortant');

Route::get('ajoutercsortant', [CsortantController::class,'division'])->name('ajoutercsortant');
Route::Post('ajoutercsortant', [CsortantController::class,'store'])->name('ajoutercsortant');

Route::get('modifiercsortant/{id}', [CsortantController::class, 'edit','modifierdivision']);
Route::put('modifiercsortant/{id}', [CsortantController::class, 'update'])->name('csortantupdate');

Route::delete('csortant/{id}', [CsortantController::class, 'destroy'])->name('csortant.delete');

//_____________________________________________Courier Entrant_______________________________________//

Route::get('centrant', [CentrantController::class, 'index']);

Route::get('searchcentrant', [CentrantController::class, 'search'])->name('searchcentrant');

Route::get('ajoutercentrant', [CentrantController::class,'division'])->name('ajoutercentrant');
Route::Post('ajoutercentrant', [CentrantController::class,'store'])->name('ajoutercentrant');

Route::get('modifiercentrant/{id}', [CentrantController::class, 'edit','modifierdivision']);
Route::put('modifiercentrant/{id}', [CentrantController::class, 'update'])->name('centrantupdate');

Route::delete('centrant/{id}', [CentrantController::class, 'destroy'])->name('centrant.delete');

//_____________________________________________visiteur Reclamation_______________________________________//



Route::get('rvisiteur', [RvisiteurController::class,'rvisiteur'])->name('rvisiteur');
Route::Post('ajouterrvisiteur', [RvisiteurController::class,'store'])->name('ajouterrvisiteur');


//_____________________________________________visiteur information_______________________________________//

Route::get('ivisiteur', [IvisiteurController::class,'ivisiteur'])->name('ivisiteur');
Route::Post('ajouterivisiteur', [IvisiteurController::class,'store'])->name('ajouterivisiteur');


//_____________________________________________Telephone_______________________________________//
Route::get('telephone', [TelephoneController::class, 'index']);

Route::get('searchtelephone', [TelephoneController::class, 'search'])->name('searchtelephone');




Route::get('/ajoutertelephone', function () {
    return view('user.telephone.ajoutertelephone');
});

Route::Post('ajoutertelephone', [TelephoneController::class,'store'])->name('ajoutertelephone');


Route::get('modifiertelephone/{id}', [TelephoneController::class, 'edit','modifiertelephone']);
Route::put('modifiertelephone/{id}', [TelephoneController::class, 'update'])->name('telephoneupdate');


Route::delete('telephone/{id}', [TelephoneController::class, 'destroy'])->name('telephone.delete');


//_____________________________________________Fax_______________________________________//
Route::get('fax', [FaxController::class, 'index']);
Route::get('searchfax', [FaxController::class, 'search'])->name('searchfax');



Route::get('/ajouterfax', function () {
    return view('user.fax.ajouterfax');
});

Route::Post('ajouterfax', [FaxController::class,'store'])->name('ajouterfax');


Route::get('modifierfax/{id}', [FaxController::class, 'edit','modifierfax']);
Route::put('modifierfax/{id}', [FaxController::class, 'update'])->name('faxupdate');


Route::delete('fax/{id}', [FaxController::class, 'destroy'])->name('fax.delete');



Route::get('searchse/{id}', [VisiteurController::class, 'searchse']);