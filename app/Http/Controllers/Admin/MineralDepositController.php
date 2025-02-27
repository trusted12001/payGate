<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MineralDeposit;
use Illuminate\Http\Request;

class MineralDepositController extends Controller
{
    public function index()
    {
        $minerals = MineralDeposit::all();
        return view('admin.mineral_deposits.index', compact('minerals'));
    }

    public function create()
    {
        return view('admin.mineral_deposits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mineral_name' => 'required|unique:mineral_deposits|min:3',
            'description' => 'nullable|string',
        ]);

        MineralDeposit::create($request->all());
        return redirect()->route('admin.mineral_deposits.index')->with('success', 'Mineral Deposit added successfully.');
    }

    public function edit(MineralDeposit $mineralDeposit)
    {
        return view('admin.mineral_deposits.edit', compact('mineralDeposit'));
    }

    public function update(Request $request, MineralDeposit $mineralDeposit)
    {
        $request->validate([
            'mineral_name' => 'required|min:3|unique:mineral_deposits,mineral_name,' . $mineralDeposit->id,
            'description' => 'nullable|string',
        ]);

        $mineralDeposit->update($request->all());
        return redirect()->route('admin.mineral_deposits.index')->with('success', 'Mineral Deposit updated successfully.');
    }

    public function destroy(MineralDeposit $mineralDeposit)
    {
        $mineralDeposit->delete();
        return redirect()->route('admin.mineral_deposits.index')->with('success', 'Mineral Deposit deleted successfully.');
    }
}
