<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    
    protected $fillable = ["id_user","datecommande","etat"];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function lignecommande()
    {
        return $this->hasMany(LigneCommande::class,"id_commande");
    }
}
