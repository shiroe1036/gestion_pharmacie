<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedocStock extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nbrStock', 'medicament_id', 'user_id'
    ];
}
