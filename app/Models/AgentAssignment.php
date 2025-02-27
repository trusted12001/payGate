<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pos_machine_id', 'assigned_at'];

    /**
     * Relationship to the user (agent).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the POS machine.
     */
    public function posMachine()
    {
        return $this->belongsTo(POSMachine::class, 'pos_machine_id');
    }
}
