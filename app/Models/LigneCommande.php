<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    protected $table = "ligne_commandes";
    
    protected $fillable = ["id_commande","codeproduit","quantite"];
    use HasFactory;
    public function produit()
    {
        return $this->belongsTo(Produit::class,"codeproduit");
    }
}
