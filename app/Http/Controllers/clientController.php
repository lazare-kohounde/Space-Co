<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

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

    public function panier () {

        return view('client.panier');
    }

    public function connexion () {

        return view('client.connexion');
    }

    // public function paiement () {

    //     return view('client.paiement');
    // }
    public function paiement(Request $request)
    {


        $status = $request->query('transaction-status'); // ou $request->input('transaction-status')
        $prenom = $request->query('prenom');
        $nom = $request->query('nom');
        $email = $request->query('email');
        $telephone = $request->query('telephone');

        // Debug facultatif
        // logger()->info('Callback reçu', $request->all());

        if ($status === 'approved') {
            // Ici tu peux vider la session panier si besoin :
            session()->forget('panier');


            // Rediriger vers le profil avec un message de succès
            return redirect()->route('membre')->with('success', 'Paiement approuvé. Bienvenue, ' . $prenom . ' !');
        }

        $panier = session('panier', []);
        $total = collect($panier)->sum('montant');
        
        return view('client.paiement', compact('panier', 'total'));
    }


    public function membre () {

        return view('client.membre');
    }

    //
    public function login_register () {

        return view('client.login_register');
    }
}
