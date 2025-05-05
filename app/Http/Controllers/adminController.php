<?php

namespace App\Http\Controllers;

class adminController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function categorie(){
        return view("admin.page.categorie.categorie");
    }

    public function profil(){
        return view("admin.profil");
    }
    
    public function Gestionnaire(){
        return view("admin.page.gestionnaire.gestionnaire");
    }


    
    public function Reservation(){
        return view("admin.page.reservation.reservation");
    }
    public function Salle(){
        return view("admin.page.salle.salle");
    }
    
}



