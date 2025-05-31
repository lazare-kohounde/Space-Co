<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Payment;
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
                    'reservation_date' => $reservation->created_at,
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
        $reservation = Reservation::where('id', $id)->first();
        $reservation_details = DetailReservation::where('reservation_id', $id)->get();
        $payment = Payment::where('reservation_id', $id)->first(); // ✅ On récupère le paiement

        $reservation_details_info = [];
        $total_price = 0; // Initialisation du total

        foreach ($reservation_details as $reservation_element) {
            $rooms = Room::where('id', $reservation_element->room_id)->get();
            //Parcourir les sales 
            foreach ($rooms as $room) {

                $formated_data = [
                    'reservation_id' => $id,
                    'room_name'  => $room->name,
                    'date_debut' => $reservation_element->start_date,
                    'date_fin' => $reservation_element->end_date,
                    'prix' => $reservation_element->price,
                    'img'  => json_decode($room->image)[0],
                ];
            }
            $total_price += $reservation_element->price; // Ajout du prix à chaque itération
            $reservation_details_info[] =  $formated_data;
        }
        return view('admin.page.reservation.detail', compact('reservation_details_info', 'reservation', 'payment'));
    }


    public function approuveReservation($id)
    {
        $user = Auth::user();

        $reservation = Reservation::find($id);
        if (!$reservation) {
            return redirect()->back()->with('error', 'Réservation introuvable.');
        }


        // Mise à jour du statut de la réservation
        $reservation->status = 'approved';
        $reservation->save();

        // Mise à jour du champ manager dans la table payments
        $payment = Payment::where('reservation_id', $reservation->id)->first();
        if ($payment) {
            $payment->manager = $user->name;
            $payment->status = 'approved';
            $payment->amount_paid = $reservation->total_amount;
            $payment->save();
        }

        return redirect()->back()->with('success', 'Réservation approuvée et paiement mis à jour.');
    }




    public function detailReservationClient($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        $reservation_details = DetailReservation::where('reservation_id', $id)->get();
        $payment = Payment::where('reservation_id', $id)->first(); // ✅ On récupère le paiement

        $reservation_details_info = [];

        foreach ($reservation_details as $reservation_element) {
            $rooms = Room::where('id', $reservation_element->room_id)->get();
            foreach ($rooms as $room) {
                $formated_data = [
                    'reservation_id' => $id,
                    'room_name'  => $room->name,
                    'date_debut' => $reservation_element->start_date,
                    'date_fin' => $reservation_element->end_date,
                    'prix' => $reservation_element->price,
                    'img'  => json_decode($room->image)[0],
                    'roomid'  => $room->id,
                ];
            }
            $reservation_details_info[] = $formated_data;
        }

        // ✅ On envoie aussi le paiement à la vue
        return view('client.detailReservation', compact('reservation_details_info', 'reservation', 'payment'));
    }




    public function annuleReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = 'cancelled';
        $reservation->save();
        return redirect()->back();
    }



    public function getReservedSlots($room_id)
    {
        $slots = \App\Models\DetailReservation::where('room_id', $room_id)
            // ->where('status', '!=', 'cancelled')
            ->get(['start_date', 'end_date']); // start_date/end_date = DATETIME

        return response()->json($slots);
    }



    public function generateFacture($id)
{
    $reservation = Reservation::findOrFail($id);
    $details = DetailReservation::where('reservation_id', $id)->get();
    $payment = Payment::where('reservation_id', $id)->first();

    $pdf = Pdf::loadView('client.facture', [
        'reservation' => $reservation,
        'details' => $details,
        'payment' => $payment,
    ]);

    return $pdf->stream('facture_reservation_' . $reservation->id . '.pdf');
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
