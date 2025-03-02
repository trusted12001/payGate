<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MiningSite;
use Illuminate\Http\Request;
use App\Models\MineralDeposit;

class MiningSiteController extends Controller
{
    protected $localGovernments = [
        'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba',
        'Jema\'a', 'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko',
        'Kajuru', 'Kaura', 'Kauru', 'Kubau', 'Kudan', 'Lere',
        'Makarfi', 'Sabon Gari', 'Sanga', 'Soba', 'Zangon Kataf', 'Zaria'
    ];

    public function index()
    {
        $sites = MiningSite::join('mineral_deposits', 'prominent_mineral_deposit', 'mineral_deposits.id')->get(['mining_sites.id','mining_sites.site_name','mining_sites.site_description','mining_sites.prominent_mineral_deposit','mining_sites.lease_number','mining_sites.local_government','mining_sites.status', 'mineral_deposits.id as mdid', 'mineral_deposits.mineral_name', 'mineral_deposits.description']);
        return view('admin.mining_sites.index', compact('sites'));
    }

    public function create()
    {
        $minerals = MineralDeposit::pluck('mineral_name', 'id');
        $localGovernments = [
            'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba', 'Jema\'a',
            'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Kaura',
            'Kauru', 'Kubau', 'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga',
            'Soba', 'Zangon Kataf', 'Zaria'
        ];

        return view('admin.mining_sites.create', compact('minerals', 'localGovernments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'prominent_mineral_deposit' => 'nullable|string',
            'lease_number' => 'required|string|unique:mining_sites',
            'local_government' => 'required|string'
        ]);

        MiningSite::create($request->all());

        return redirect()->route('admin.mining_sites.index')
            ->with('success', 'Mining site created successfully.');
    }



    public function edit($id)
    {
        $site = MiningSite::findOrFail($id);
        $localGovernments = $this->localGovernments;
        $minerals = MineralDeposit::pluck('mineral_name', 'id');
        return view('admin.mining_sites.edit', compact('site', 'minerals', 'localGovernments'));    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'prominent_mineral_deposit' => 'nullable|string',
            'lease_number' => 'required|string|unique:mining_sites,lease_number,'.$id,
            'local_government' => 'required|string'
        ]);

        $site = MiningSite::findOrFail($id);
        $site->update($request->all());

        return redirect()->route('admin.mining_sites.index')
            ->with('success', 'Mining site updated successfully.');
    }

    public function destroy($id)
    {
        $site = MiningSite::findOrFail($id);
        $site->delete();

        return redirect()->route('admin.mining_sites.index')
            ->with('success', 'Mining site deleted successfully.');
    }
}
