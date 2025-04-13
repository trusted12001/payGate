<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AgentAssignment;


class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'created_by'
    ];

    public function lgas()
    {
        return $this->belongsToMany(Lga::class, 'agency_lga');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function agentAssignments()
    {
        return $this->hasMany(AgentAssignment::class);
    }

    // Optional helper to get the users (agents) assigned under this agency
    public function agents()
    {
        return $this->hasManyThrough(
            \App\Models\User::class,
            AgentAssignment::class,
            'agency_id', // FK on agent_assignments
            'id',        // FK on users
            'id',        // PK on agencies
            'user_id'    // FK on agent_assignments to users
        );
    }
}
