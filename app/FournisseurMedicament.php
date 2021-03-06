<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FournisseurMedicament extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'fournisseur_id', 'medicament_id', 'dateExp', 'prixAchat'
    ];
}
