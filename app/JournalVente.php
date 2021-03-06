<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalVente extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'remise', 'total_medoc', 'rendu', 'client_id', 'user_id'
    ];
}
