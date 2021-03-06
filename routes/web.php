<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Homecontroller@index')->name('home');

Auth::routes();

// client route
Route::resource('client', 'ClientController');
Route::get('searchClient', 'ClientController@searchClient')->name('client.search');

// fournisseur route
Route::resource('fournisseur', 'FournisseurController');
Route::get('searchFrns', 'FournisseurController@findFrns')->name('fournisseur.search');

// medicament route
Route::resource('medicament', 'MedicamentController');
Route::get('searchMedoc', 'MedicamentController@findMedoc')->name('medicament.search');