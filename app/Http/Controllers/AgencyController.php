<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Lga;
use Illuminate\Http\Request;
use App\Models\AgentAssignment;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::withCount('agents')->latest()->paginate(10);
        return view('agencies.index', compact('agencies'));
    }

    public function create()
    {
        $lgas = Lga::all(); // assuming LGAs are in a reference table
        return view('agencies.create', compact('lgas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'lgas' => 'required|array',
        ]);

        $agency = Agency::create([
            ...$request->only(['name', 'email', 'phone', 'address']),
            'created_by' => auth()->id(),
        ]);

        $agency->lgas()->sync($request->lgas);

        return redirect()->route('agencies.index')->with('success', 'Agency created successfully.');
    }

    public function edit(Agency $agency)
    {
        $lgas = Lga::all();
        $selectedLgas = $agency->lgas->pluck('id')->toArray();
        return view('agencies.edit', compact('agency', 'lgas', 'selectedLgas'));
    }

    public function update(Request $request, Agency $agency)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'lgas' => 'required|array',
        ]);

        $agency->update($request->only(['name', 'email', 'phone', 'address']));
        $agency->lgas()->sync($request->lgas);

        return redirect()->route('agencies.index')->with('success', 'Agency updated successfully.');
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();
        return back()->with('success', 'Agency deleted.');
    }


    public function viewAgents(Agency $agency)
    {
        $assignments = AgentAssignment::with(['user', 'lga', 'posMachine'])
            ->where('agency_id', $agency->id)
            ->latest('assigned_at')
            ->get();

        return view('agencies.agents', compact('agency', 'assignments'));
    }

}
