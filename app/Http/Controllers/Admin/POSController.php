<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\POSMachine; // We'll create this model shortly.
use App\Models\AgentAssignment; // And this model too.

class POSController extends Controller
{
    /**
     * Display a listing of the POS machines.
     */
    public function index()
    {
        // Fetch all POS machines (consider eager loading assignment if needed)
        $posMachines = POSMachine::with('assignment.user')->paginate(10);
        return view('admin.pos.index', compact('posMachines'));
    }

    /**
     * Show the form for creating a new POS machine.
     */
    public function create()
    {
        return view('admin.pos.create');
    }

    /**
     * Store a newly created POS machine in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pos_code' => 'required|string|unique:pos_machines',
            'status'   => 'required|string',
        ]);

        POSMachine::create($validated);

        return redirect()->route('admin.pos.index')->with('success', 'POS Machine created successfully.');
    }

    /**
     * Show the form for editing the specified POS machine.
     */
    public function edit(POSMachine $pos)
    {
        return view('admin.pos.edit', compact('pos'));
    }

    /**
     * Update the specified POS machine in storage.
     */
    public function update(Request $request, POSMachine $pos)
    {
        $validated = $request->validate([
            'pos_code' => 'required|string|unique:pos_machines,pos_code,'.$pos->id,
            'status'   => 'required|string',
        ]);

        $pos->update($validated);

        return redirect()->route('admin.pos.index')->with('success', 'POS Machine updated successfully.');
    }

    /**
     * Remove the specified POS machine from storage.
     */
    public function destroy(POSMachine $pos)
    {
        $pos->delete();
        return redirect()->route('admin.pos.index')->with('success', 'POS Machine deleted successfully.');
    }
}
