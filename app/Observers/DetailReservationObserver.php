<?php

namespace App\Observers;

use App\Models\DetailReservation;

class DetailReservationObserver
{
    public function saved(DetailReservation $detailReservation)
    {
        $reservation = $detailReservation->reservation;
        $total = $reservation->detailReservations()->sum('price');
        $reservation->total_amount = $total;
        $reservation->save();

        // Met à jour aussi le paiement si nécessaire
        if ($reservation->payment) {
            $reservation->payment->amount_paid = $total;
            $reservation->payment->save();
        }
    }

    public function deleted(DetailReservation $detailReservation)
    {
        $reservation = $detailReservation->reservation;
        $total = $reservation->detailReservations()->sum('price');
        $reservation->total_amount = $total;
        $reservation->save();

        if ($reservation->payment) {
            $reservation->payment->amount_paid = $total;
            $reservation->payment->save();
        }
    }
}
