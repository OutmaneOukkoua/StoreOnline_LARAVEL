<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommandeDemo extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['id_user','codeproduit',"quantite"];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'codeproduit');
    }
}
