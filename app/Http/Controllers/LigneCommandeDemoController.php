<?php

namespace App\Http\Controllers;

use App\Models\LigneCommandeDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LigneCommandeDemoController extends Controller
{

    public function index()
    {
        $produits = LigneCommandeDemo::all()->where("id_user",Auth::user()->id);
        return view("commandes.panier",compact("produits"));
    }

    public function create()
    {
        //
        
    }

    public function store(Request $request)
    {
        // echo "Daoudi";
        $ExisteProduitByUser = LigneCommandeDemo::all()->where("id_user", Auth::user()->id)->where("codeproduit", $request->codeproduit)->first();
        if ($ExisteProduitByUser) {
            $ExisteProduitByUser->quantite = $ExisteProduitByUser->quantite + $request->quantite;
            $ExisteProduitByUser->save();
        } else {
            LigneCommandeDemo::create(["id_user"=>Auth::user()->id,"codeproduit"=>$request->codeproduit,"quantite"=>$request->quantite]);
        }
        $lignecommandedmo = LigneCommandeDemo::all()->where("id_user", Auth::user()->id);
            echo json_encode($lignecommandedmo->count());
    }

    public function show(LigneCommandeDemo $ligneCommandeDemo)
    {
        //
    }

    public function edit(LigneCommandeDemo $ligneCommandeDemo)
    {
        //
    }


    public function update(Request $request, LigneCommandeDemo $ligneCommandeDemo)
    {
        //
    }

    public function destroy($id)
    {
        $ligneCommandeDemo = LigneCommandeDemo::all()->find($id);
        
        $ligneCommandeDemo->delete();
        return back()->with('success', 'Produit supprimée avec succès');
    }
}
