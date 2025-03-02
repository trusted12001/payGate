<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RevenueSetting;
use Illuminate\Http\Request;
use App\Models\MineralDeposit;

class RevenueSettingController extends Controller
{
    public function index()
    {
        // Fetch revenue settings with related minerals
        $settings = RevenueSetting::with('mineralDeposit')->get();
        return view('admin.revenue_settings.index', compact('settings'));
    }

    public function create()
    {
        // Fetch minerals for dropdown selection
        $minerals = MineralDeposit::pluck('mineral_name', 'id');
        return view('admin.revenue_settings.create', compact('minerals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mineral_id' => 'required|exists:mineral_deposits,id',  // Ensure mineral exists
            'per_gram' => 'nullable|numeric|min:0',
            'per_kg' => 'nullable|numeric|min:0',
            'per_bag' => 'nullable|numeric|min:0',
            'per_ton' => 'nullable|numeric|min:0',
            'per_truck' => 'nullable|numeric|min:0',
        ]);

        // Prevent duplicate mineral revenue settings
        if (RevenueSetting::where('mineral_id', $request->mineral_id)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Revenue setting for this mineral already exists.');
        }

        RevenueSetting::create([
            'mineral_id' => $request->mineral_id,
            'per_gram' => $request->per_gram ?? null,
            'per_kg' => $request->per_kg ?? null,
            'per_bag' => $request->per_bag ?? null,
            'per_ton' => $request->per_ton ?? null,
            'per_truck' => $request->per_truck ?? null,
        ]);

        return redirect()->route('admin.revenue_settings.index')->with('success', 'Revenue setting created successfully.');
    }

    public function edit($id)
    {
        $setting = RevenueSetting::findOrFail($id);
        $minerals = MineralDeposit::pluck('mineral_name', 'id'); // Fetch minerals

        return view('admin.revenue_settings.edit', compact('setting', 'minerals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mineral_id' => 'required|exists:mineral_deposits,id',
            'per_gram' => 'nullable|numeric|min:0',
            'per_kg' => 'nullable|numeric|min:0',
            'per_bag' => 'nullable|numeric|min:0',
            'per_ton' => 'nullable|numeric|min:0',
            'per_truck' => 'nullable|numeric|min:0',
        ]);

        $setting = RevenueSetting::findOrFail($id);
        $setting->update([
            'mineral_id' => $request->mineral_id,
            'per_gram' => $request->per_gram ?? null,
            'per_kg' => $request->per_kg ?? null,
            'per_bag' => $request->per_bag ?? null,
            'per_ton' => $request->per_ton ?? null,
            'per_truck' => $request->per_truck ?? null,
        ]);

        return redirect()->route('admin.revenue_settings.index')->with('success', 'Revenue setting updated successfully.');
    }

    public function destroy($id)
    {
        $setting = RevenueSetting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.revenue_settings.index')->with('success', 'Revenue setting deleted successfully.');
    }
}
