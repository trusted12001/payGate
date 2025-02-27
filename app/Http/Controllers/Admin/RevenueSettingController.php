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
        $settings = RevenueSetting::all();
        return view('admin.revenue_settings.index', compact('settings'));
    }

    public function create()
    {
        // List of minerals for the dropdown
        $minerals = MineralDeposit::pluck('mineral_name', 'id');
        return view('admin.revenue_settings.create', compact('minerals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mineral' => 'required|string|max:255',
            'per_gram' => 'nullable|numeric',
            'per_kg' => 'nullable|numeric',
            'per_bag' => 'nullable|numeric',
            'per_ton' => 'nullable|numeric',
            'per_truck' => 'nullable|numeric',
        ]);

        RevenueSetting::create($request->all());

        return redirect()->route('admin.revenue_settings.index')->with('success', 'Revenue setting created successfully.');
    }

    public function edit($id)
    {
        $setting = RevenueSetting::findOrFail($id);

        // List of minerals for the dropdown
        $minerals = MineralDeposit::pluck('mineral_name', 'id');
        return view('admin.revenue_settings.edit', compact('setting', 'minerals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mineral' => 'required|string|max:255',
            'per_gram' => 'nullable|numeric',
            'per_kg' => 'nullable|numeric',
            'per_bag' => 'nullable|numeric',
            'per_ton' => 'nullable|numeric',
            'per_truck' => 'nullable|numeric',
        ]);

        $setting = RevenueSetting::findOrFail($id);
        $setting->update($request->all());

        return redirect()->route('admin.revenue_settings.index')->with('success', 'Revenue setting updated successfully.');
    }

    public function destroy($id)
    {
        $setting = RevenueSetting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.revenue_settings.index')->with('success', 'Revenue setting deleted successfully.');
    }
}
