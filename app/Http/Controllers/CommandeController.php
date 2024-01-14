<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\LigneCommandeDemo;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view("commandes.index", compact("commandes"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Commande::create(["id_user" => Auth::user()->id, "datecommande" => now(), "etat" => "En Cours"]);
        $commande = Commande::all()->where("id_user", Auth::user()->id)->sortByDesc("id")->first();
        $ligneComamndeDemo = LigneCommandeDemo::all()->where("id_user", Auth::user()->id);
        foreach ($ligneComamndeDemo as $ligne) {
            LigneCommande::create(["id_commande" => $commande->id, "codeproduit" => $ligne->codeproduit, "quantite" => $ligne->quantite]);
            $ligne->delete();
        }
        return redirect()->route("produits.acheter")->with('success', 'Commande Ajoutée avec succès');
    }


    public function show($id)
    {
        $commande = Commande::all()->find($id);
        $lignecommandes = $commande->lignecommande;
        $produits = [];
        foreach ($lignecommandes as $ligne) {
            $ligne = LigneCommande::all()->firstWhere("codeproduit", $ligne->codeproduit);
            $produits[] = $ligne->produit;
        }
        // dd($produits);
        return view("commandes.show", compact("commande", "produits", "lignecommandes"));
    }


    public function edit(Commande $commande)
    {
        //
    }

    public function update(Request $request, Commande $commande)
    {
        //
    }


    public function destroy($commande)
    {
        $commande_delete = Commande::all()->find($commande);
        // dd($commande_delete);
        $commande_delete->delete();
        return back()->with('success', 'Commande supprimée avec succès');
    }
    public function valider($commande)
    {
        $commande_valider = Commande::all()->find($commande);
        $commande_valider->etat = "Valider";
        $commande_valider->save();
        return back()->with('success', 'Commande Validée avec succès');
    }
    public function annuler($commande)
    {
        $commande_Annuler = Commande::all()->find($commande);
        $commande_Annuler->etat = "Annuler";
        $commande_Annuler->save();
        return back()->with('success', 'Commande Annulée avec succès');
    }
}
