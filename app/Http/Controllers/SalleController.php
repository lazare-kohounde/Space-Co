<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalleController extends Controller
{
    //
    public function liste_salle () {

        return view('salle');
    }
}
