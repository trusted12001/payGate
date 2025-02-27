<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueSetting extends Model
{
    protected $fillable = [
        'mineral',
        'per_gram',
        'per_kg',
        'per_bag',
        'per_ton',
        'per_truck'
    ];
}
