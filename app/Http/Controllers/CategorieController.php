<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::with('produits')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function show(Categorie $categorie){
        $produits = $categorie->produits;
        return view('categories.show', compact('categorie',"produits"));
    }
    public function store(CategorieRequest $request)
    {
        $categorie = Categorie::create([
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'La catégorie a été créée avec succès.');
    }

    public function edit(Categorie $categorie)
    {
        // dd($categorie->description);
        return view('categories.edit', compact('categorie'));
    }

    public function update(CategorieRequest $request, Categorie $categorie)
    {
        $categorie->update([
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'La catégorie a été mise à jour avec succès.');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }
}


?>