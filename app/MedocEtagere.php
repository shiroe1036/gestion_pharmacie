<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedocEtagere extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nbrEtagere', 'unite', 'medoc_stock_id', 'user_id'
    ];
}
