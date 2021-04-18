<?php

use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/a-propos', function () {
    $name = 'Fiorella';

    return view('about', [
        'name' => $name,
        'bibis' => [1, 2, 3, 4],
    ]);
});
            // AFFICHER LES ANNONCES

Route::get('nos-annonces', function(){

    $properties = DB::select('select * from properties where sold = :sold',[
        'sold' => 0,
    ]);

    $properties = DB::table('properties')
    ->where('sold', 0)->where('sold', '=', 1, 'or')->get();

    return View('properties/index', [
        'properties' => $properties,
    ]);
});


//VOIR ANNONCE nos-annonce/2

Route::get('/annonce/{id}', function ($id) {
    // $property = DB::table('properties')->where('id', $id)->get()->first();
    $property = DB::table('properties')->find($id);

    if(! $property){
        abort(404); 
        // on renvoie une 404
    }
  
    return view('properties/show', ['property' => $property]);
})->whereNumber('id');

Route::get('/annonce/creer', function () {
    return view('properties/create');
   
});