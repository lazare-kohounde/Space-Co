<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\DetailReservation;
class ReservationController extends Controller
{
    //

    public function show($id)
{
    $reservation = Reservation::with('details.room')->findOrFail($id); // 'details' = relation avec detail_reservations
    return view('reservations.details', compact('reservation'));
}

public function cancel(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);

    

    $reservation->status = 'cancelled';
    $reservation->save();

    return redirect()->route('reservations.details', $reservation->id)
        ->with('success', 'La réservation a bien été annulée.');
}
}
