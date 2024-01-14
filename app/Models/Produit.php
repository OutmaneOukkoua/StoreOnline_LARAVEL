<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'codeproduit';
    
    public $incrementing = false;
    protected $fillable = [
        'codeproduit',
        'description',
        'image',
        'prix',
        'id_categorie',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}
