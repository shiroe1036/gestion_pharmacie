<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicament extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nomMedoc', 'famille', 'prixVente'
    ];
}
