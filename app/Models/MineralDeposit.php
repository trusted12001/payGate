<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MineralDeposit extends Model
{
    // Allow these fields to be mass assigned
    protected $fillable = [
    'mineral_name',
    'description',
    ];

}
