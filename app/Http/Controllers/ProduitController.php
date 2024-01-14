<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{

    public function acheter($categorie = null)
    {
        $categories = Categorie::all();
        if ($categorie == null)
            $produits = Produit::all();
        else
            $produits = Produit::all()->where("id_categorie", $categorie);

        return view('produit.acheter', compact('produits','categories'));
    }
    public function index()
    {
        $produits = Produit::all();
        // dd($produits);
        return view('produit.index', compact('produits'));
    }

    public function create()
    { // Code pour récupérer les catégories et les passer à la vue create
        $categories = Categorie::all();
        return view('produit.create', compact('categories'));
    }

    public function store(ProduitRequest $request)
    {
        $validatedData = $request->validated();

        $imagePath = $request->file('image')->store('public/images');
        $liendata = explode("/", $imagePath);
        $validatedData['image'] = "storage/images/" . $liendata[2];

        Produit::create($validatedData);
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');
    }

    public function show(Produit $produit)
    {
        // Afficher detail de Produit
    }

    public function edit(Produit $produit)
    {
        // dd($produit);
        $categories = Categorie::all();
        return view('produit.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, Produit $produit)
    {
        $validatedData = $request->all();
        if ($request->hasFile('image')) {
            $liendatadelete = explode("/", $produit->image);
            Storage::delete("public/images/" . $liendatadelete[2]);
            $imagePath = $request->file('image')->store('public/images');
            $liendata = explode("/", $imagePath);
            $validatedData['image'] = "storage/images/" . $liendata[2];
        }

        $produit->update($validatedData);
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    public function destroy(Produit $produit)
    {
        Storage::delete($produit->image);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}
