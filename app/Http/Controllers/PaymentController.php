<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function handleCallback(Request $request)
    {
        // Vider la session du panier
        Session::forget('cart'); // ou Session::put('cart', []);

        // Traiter la réponse du paiement si nécessaire
        // $request->all() peut contenir des infos utiles sur la transaction

        // Rediriger l'utilisateur avec un message
        return redirect()->route('membre')->with('success', 'Paiement réussi. Votre panier a été vidé.');
    }


}
