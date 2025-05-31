<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\DetailReservation;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class clientController extends Controller
{
    //
    public function salledetails()
    {
        return view('client.salle-details');
    }

    //
    public function liste_salle()
    {

        return view('client.salle');
    }

    //
    public function contact()
    {

        return view('client.contact');
    }

    public function panier()
    {

        return view('client.panier');
    }

    public function connexion()
    {

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

            // stockage des données dans la base :

            // 1. Récupérer le panier et l'utilisateur
            $panier = session('panier'); // tableau des salles réservées
            $user = Auth::user();

            // 2. Récupérer le statut et infos paiement depuis FedaPay (callback)
            $amountPaid = array_sum(array_column($panier, 'montant')) / 2; // ou récupéré depuis la session 
            $paymentMethod = 'FEDAPay';
            //dd($panier);
            // 3. Calculer le total du panier si besoin
            $total = array_sum(array_column($panier, 'montant'));
            // 4. Transaction pour garantir l'intégrité
            DB::beginTransaction();
            try {
                // a. Créer la réservation
                $reservation = Reservation::create([
                    'status' => "pending", // ou selon ta logique
                    'total_amount' => $total,
                    'reservation_date' => Carbon::now()->format('Y-m-d H:i'),
                    'user_id' => $user->id,
                ]);

                // b. Créer les détails de réservation
                foreach ($panier as $item) {
                    DetailReservation::create([
                        'reservation_id' => $reservation->id,
                        'room_id'        => $item['id'],
                        'start_date'     => \Carbon\Carbon::parse($item['date_debut'])->format('Y-m-d H:i'),
                        'end_date'       => \Carbon\Carbon::parse($item['date_fin'])->format('Y-m-d H:i'),
                        'price'          => $item['montant'],
                        'option'         => $item['option'],
                    ]);
                }

                // c. Créer le paiement
                Payment::create([
                    'reservation_id' => $reservation->id,
                    'author'         => $user->name,
                    'amount_paid'    => $amountPaid,
                    'status'         => "pending",
                    'payment_method' => $paymentMethod,
                    'payment_date'   => Carbon::now(),
                ]);

                DB::commit();
                // dd($total);




                // Ici tu peux vider la session panier si besoin :
                session()->forget('panier');


                // Rediriger vers le profil avec un message de succès
                return redirect()->route('historique.reservation')->with('success', 'Paiement réussi, cliquez sur Historique Réservations pour autres actions. , ' . $prenom . ' !');
            } catch (\Exception $e) {
                dd($e->getMessage());
                DB::rollBack();
            }
        }

        $panier = session('panier', []);
        $total = collect($panier)->sum('montant');

        return view('client.paiement', compact('panier', 'total'));
    }



    public function membre()
    {

        // Récupérer l'utilisateur connecté


        // Récupérer ses réservations (triées par date de création, les plus récentes d'abord)

        return view('client.membre');
    }

    //
    public function login_register()
    {

        return view('client.login_register');
    }

    public function historiqueReservation()
    {
        $user = Auth::user();
        $reservations = \App\Models\Reservation::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('client.historique', compact('user', 'reservations'));
    }
}
