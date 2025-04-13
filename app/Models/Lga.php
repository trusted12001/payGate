<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AgentAssignment;

class Lga extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function agencies()
    {
        return $this->belongsToMany(Agency::class, 'agency_lga');
    }

    public function agents()
    {
        return $this->hasMany(AgentAssignment::class);
    }
}
