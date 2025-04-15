<?php

namespace App\Http\Controllers;

class adminController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function categorie(){
        return view("admin.page.categorie.index");
    }

    
    public function Gestionnaire(){
        return view("admin.page.gestionnaire.index");
    }


    
    public function Reservation(){
        return view("admin.page.reservation.index");
    }
    public function Salle(){
        return view("admin.page.salle.index");
    }
    
}



