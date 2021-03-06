<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalMedocEtagere extends Model
{
    use SoftDeletes; 
    
    protected $fillable = [
        'journal_vente_id', 'medoc_etagere_id'
    ];
}
