<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lga;
use App\Models\Agency;
use App\Models\POSMachine;
use App\Models\AgentAssignment;
use Illuminate\Http\Request;

class AgentAssignmentController extends Controller
{
    public function create(Agency $agency)
    {
        $users = User::role('agent')->get(); // Only users with role 'agent'
        $lgas = $agency->lgas;
        $posMachines = POSMachine::all(); // Consider filtering unassigned ones

        return view('agent_assignments.create', compact('agency', 'users', 'lgas', 'posMachines'));
    }

    public function store(Request $request, Agency $agency)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lga_id' => 'required|exists:lgas,id',
            'pos_machine_id' => 'required|exists:pos_machines,id',
        ]);

        AgentAssignment::create([
            'user_id' => $validated['user_id'],
            'lga_id' => $validated['lga_id'],
            'pos_machine_id' => $validated['pos_machine_id'],
            'agency_id' => $agency->id,
            'assigned_at' => now(),
        ]);

        return redirect()->route('agencies.index')->with('success', 'Agent assigned successfully.');
    }
}
