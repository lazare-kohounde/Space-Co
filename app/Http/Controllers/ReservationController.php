<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\DetailReservation;
use App\Models\Room;

class ReservationController extends Controller
{
    /**
     * Return array of reservations
     */
    public function getReservations()
    {
        $reservations = \App\Models\Reservation::with('user') // Eager load user to avoid N+1 problem
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($reservation) {
                return [
                    'id' => $reservation->id,
                    'total_amount' => $reservation->total_amount,
                    'reservation_date' => $reservation->reservation_date,
                    'user_name' => $reservation->user->name ?? 'Utilisateur inconnu',
                    'created_at' => $reservation->created_at,
                    'updated_at' => $reservation->updated_at,
                    'status' => $reservation->status,
                ];
            });
    
        return $reservations;
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function detailReservation($id)
    {   
        $reservation = Reservation::where('id',$id)->first();
        $reservation_details = DetailReservation::where('reservation_id',$id)->get();
        
        $reservation_details_info = [];

        foreach($reservation_details as $reservation_element){
            $rooms= Room::where('id',$reservation_element->room_id)->get();
            //Parcourir les sales 
            foreach($rooms as $room){
                $formated_data = [
                    'reservation_id' => $id,
                    'room_name'  => $room->name,
                    'date_debut' => $reservation_element->start_date,
                    'date_fin' => $reservation_element->end_date,
                    'prix' => $reservation_element->price,
                    'img'  => json_decode($room->image)[0],
                ];
            }
            $reservation_details_info[]=  $formated_data;
        }
        return view('admin.page.reservation.detail',compact('reservation_details_info','reservation'));
    }


    public function approuveReservation ($id){
      $reservation = Reservation::find($id);
      $reservation->status = 'approved';
      $reservation->save();
      return redirect()->back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
