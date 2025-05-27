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
            // dd(gettype($request->date_debut));
            $request->validate([
                'id' => 'required',
                'nom' => 'required|string',
                'adresse' => 'required|string',
                'date_debut' => 'required|string',
                'date_fin' => 'required|string',
                'option' => 'required|string',
                'montant' => 'required|numeric',
                'image' => 'required|string',
            ]);
            $panier = session()->get('panier', []);
            
            $panier[] = [
                'id' => $request->id,
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'date_debut' => Carbon::createFromFormat('d/m/Y H:i', $request->date_debut)->format('Y-m-d H:i'),
                'date_fin'   => Carbon::createFromFormat('d/m/Y H:i', $request->date_fin)->format('Y-m-d H:i'),                
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
    
    