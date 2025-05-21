<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function index()
    {
        $panier = Session::get('panier', []);
        $total = array_sum(array_column($panier, 'montant'));

        return view('client.panier', compact('panier', 'total'));
    }

    public function ajouterAuPanier(Request $request)
        {
            $request->validate([
                'id' => 'required|integer',
                'nom' => 'required|string',
                'adresse' => 'required|string',
                'date_debut' => 'required|date',
                'date_fin' => 'required|date|after:date_debut',
                'option' => 'required|string',
                'montant' => 'required|numeric',
                'image' => 'required|string',
            ]);
            // dd($request);
            $panier = session()->get('panier', []);
            
            $panier[] = [
                'id' => $request->id,
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'date_debut' => Carbon::parse($request->date_debut)->format('Y-m-d H:i'),
                'date_fin'   => Carbon::parse($request->date_fin)->format('Y-m-d H:i'),
                'option' => $request->option,
                'montant' => $request->montant,
                'image' => $request->image,
            ];
            
            session()->put('panier', $panier);
            
            return redirect()->route('panier')->with('success', 'Salle ajoutée au panier.');
            
        }
        
        public function supprimer($id)
        {
            $panier = Session::get('panier', []);
            $panier = array_filter($panier, fn ($item) => $item['id'] != $id);
            
            Session::put('panier', $panier);
            
            return redirect()->route('panier')->with('success', 'Salle retirée du panier.');
        }
    }
    
    