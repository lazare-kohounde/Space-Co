<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;


// roote client

Route::get('/', function () {    return view('client.index');})->name('accueil');
Route::get('/salle', [clientController::class, 'liste_salle'])->name('salle');
Route::get('/salle-details', [clientController::class, 'salledetails'])->name('salledetails');
Route::get('/contact', [clientController::class, 'contact'])->name('contact');




// roote admin

Route::get('/log-admin', function () {    return view('admin.index');})->name('dashboard');
Route::get('/log-admin/categorie', [adminController::class, 'categorie'])->name('categorie');
Route::get('/log-admin/gestionnaire', [adminController::class, 'gestionnaire'])->name('gestionnaire');
Route::get('/log-admin/reservation', [adminController::class, 'reservation'])->name('reservation');
Route::get('/log-admin/salle', [adminController::class, 'salle'])->name('salleAdmin');
