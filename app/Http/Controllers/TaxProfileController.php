<?php

namespace App\Http\Controllers;

use App\Models\TaxProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaxProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $taxProfiles = TaxProfile::all(); // Admin can see all profiles
        } elseif (Auth::user()->hasRole('Agent')) {
            $taxProfiles = TaxProfile::where('assigned_agent_id', Auth::id())->get(); // Agents see only their assigned profiles
        } else {
            $taxProfiles = TaxProfile::where('email', Auth::user()->email)->get(); // Taxpayers see only their profile
        }

        return view('tax-profile.index', compact('taxProfiles'));
    }

    public function create()
    {
        $agents = User::role('Agent')->pluck('name', 'id'); // Get all agents
        $localGovernments = [
            'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba',
            'Jema\'a', 'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko',
            'Kajuru', 'Kaura', 'Kauru', 'Kubau', 'Kudan', 'Lere',
            'Makarfi', 'Sabon Gari', 'Sanga', 'Soba', 'Zangon Kataf', 'Zaria'
        ];
        return view('tax-profile.create', compact('agents', 'localGovernments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'taxpayer_type' => 'required|string',
            'full_name' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:tax_profiles',
            'phone_number' => 'required|string|max:20',
            'local_government' => 'required|string',
            'tax_category' => 'required|string',
            'business_reg_number' => 'nullable|string',
            'identification_number' => 'nullable|string',
            'registered_address' => 'required|string',
            'assigned_agent_id' => 'nullable|exists:users,id',
        ]);

        TaxProfile::create([
            'user_id' => auth()->id(), // This ensures the profile belongs to the logged-in user
            'taxpayer_type' => $request->taxpayer_type,
            'full_name' => $request->full_name,
            'business_name' => $request->business_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'local_government' => $request->local_government,
            'tax_category' => $request->tax_category,
            'business_reg_number' => $request->business_reg_number,
            'identification_number' => $request->identification_number,
            'registered_address' => $request->registered_address,
            'assigned_agent_id' => $request->assigned_agent_id,
            'status' => 'Active', // Default status
        ]);
        $taxProfiles = TaxProfile::all(); // Fetch all tax profiles from the database
        return view('tax-profile.index', compact('taxProfiles'))
            ->with('success', 'Tax profile created successfully.');
    }



    public function edit($id)
    {
        $taxProfile = TaxProfile::findOrFail($id); // Fetch tax profile by ID
        $localGovernments = [
            'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba', 'Jema\'a',
            'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Kaura',
            'Kauru', 'Kubau', 'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga',
            'Soba', 'Zangon Kataf', 'Zaria'
        ];

        $taxCategories = [
            'Royalty', 'Corporate Income Tax', 'Indirect Tax',
            'Licensing Fees', 'Surface Right Fees',
            'Environmental Fees', 'Production Sharing'
        ];

        return view('tax-profile.edit', compact('taxProfile', 'localGovernments', 'taxCategories'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'taxpayer_type' => 'required|string',
            'full_name' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:tax_profiles,email,' . $id,
            'phone_number' => 'required|string|max:20',
            'local_government' => 'required|string',
            'tax_category' => 'required|string',
            'business_reg_number' => 'nullable|string',
            'identification_number' => 'nullable|string',
            'registered_address' => 'required|string',
        ]);

        $taxProfile = TaxProfile::findOrFail($id);

        $taxProfile->update([
            'taxpayer_type' => $request->taxpayer_type,
            'full_name' => $request->full_name,
            'business_name' => $request->business_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'local_government' => $request->local_government,
            'tax_category' => $request->tax_category,
            'business_reg_number' => $request->business_reg_number,
            'identification_number' => $request->identification_number,
            'registered_address' => $request->registered_address,
        ]);

        return redirect()->route('tax-profile.index')->with('success', 'Tax Profile updated successfully.');
    }

}
