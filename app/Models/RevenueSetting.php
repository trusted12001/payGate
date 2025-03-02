<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueSetting extends Model
{
    protected $fillable = [
        'mineral_id',
        'per_gram',
        'per_kg',
        'per_bag',
        'per_ton',
        'per_truck'
    ];

    public function mineralDeposit()
    {
        return $this->belongsTo(MineralDeposit::class, 'mineral_id');
    }

}
