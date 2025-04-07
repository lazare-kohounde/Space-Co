<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SalleDetailsController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {    return view('index');})->name('accueil');

Route::get('/salle', [SalleController::class, 'liste_salle'])->name('salle');
Route::get('/salle-details', [SalleDetailsController::class, 'salledetails'])->name('salledetails');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');


