<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;


Route::get('/', function () {    return view('client.index');})->name('accueil');
Route::get('/log-admin', function () {    return view('admin.index');})->name('dashboard');

Route::get('/salle', [frontendController::class, 'liste_salle'])->name('salle');
Route::get('/salle-details', [frontendController::class, 'salledetails'])->name('salledetails');
Route::get('/contact', [frontendController::class, 'contact'])->name('contact');


