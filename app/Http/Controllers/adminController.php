<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Categorie;
class adminController extends Controller
{
    public function index(){

        
        return view('admin.index');
    }

    public function stats()
    {
        $data = [
            'reservations' => Reservation::count(),
            'rooms'        => Room::count(),
            'categories'   => Categorie::count(),
            'revenue'      => Reservation::whereIn('status', ['pending', 'approved'])->sum('total_amount'),
        ];

        return response()->json($data);
    }


    public function profil(){
        return view("admin.profil");
    }

    public function categorie(){
        return view("admin.page.categorie.categorie");
    }
    
    public function Gestionnaire(){
        return view("admin.page.gestionnaire.gestionnaire");
    }


    public function Reservation()
    {
        $reservations = (new ReservationController())->getReservations();
     
        return view("admin.page.reservation.reservation",compact('reservations'));
    }
    public function Salle(){
        return view("admin.page.salle.salle");
    }
    
}



