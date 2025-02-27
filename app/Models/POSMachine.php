<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSMachine extends Model
{
    use HasFactory;
    protected $table = 'pos_machines';
    protected $fillable = ['pos_code', 'status'];

    /**
     * Relationship with agent assignment.
     */
    public function assignment()
    {
        return $this->hasOne(AgentAssignment::class, 'pos_machine_id');
    }
}
