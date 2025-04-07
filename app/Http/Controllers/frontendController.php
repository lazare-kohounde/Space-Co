<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    //
    public function salledetails () {
        return view('client.salle-details');
    }

    //
    public function liste_salle () {

        return view('client.salle');
    }

    //
    public function contact () {

        return view('client.contact');
    }
}
