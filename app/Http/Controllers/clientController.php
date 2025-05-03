<?php

namespace App\Http\Controllers;

class clientController extends Controller
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

    //
    public function login_register () {

        return view('client.login_register');
    }
}
