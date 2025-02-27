<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxProfile;
use Illuminate\Support\Facades\Auth;

class TaxProfileController extends Controller
{
    /**
     * Show the form for creating a new tax profile.
     */
    public function create()
    {
        // If user already has a profile, redirect to edit
        $profile = Auth::user()->taxProfile;
        if ($profile) {
            return redirect()->route('tax-profile.edit');
        }
        $lgas = $this->getKadunaLGAs();
        return view('tax-profile.create', compact('lgas'));
    }

    /**
     * Store a newly created tax profile.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tax_category'    => 'required|string',
            'lga'             => 'required|string',
            'additional_info' => 'nullable|string',
        ]);

        TaxProfile::create([
            'user_id'         => Auth::id(),
            'tax_category'    => $request->tax_category,
            'lga'             => $request->lga,
            'additional_info' => $request->additional_info,
        ]);

        return redirect()->route('dashboard')->with('success', 'Tax profile created successfully.');
    }

    /**
     * Show the form for editing the tax profile.
     */
    public function edit()
    {
        $profile = Auth::user()->taxProfile;
        if (!$profile) {
            return redirect()->route('tax-profile.create');
        }
        $lgas = $this->getKadunaLGAs();
        return view('tax-profile.edit', compact('profile', 'lgas'));
    }

    /**
     * Update the tax profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'tax_category'    => 'required|string',
            'lga'             => 'required|string',
            'additional_info' => 'nullable|string',
        ]);

        $profile = Auth::user()->taxProfile;
        $profile->update($request->only('tax_category', 'lga', 'additional_info'));

        return redirect()->route('dashboard')->with('success', 'Tax profile updated successfully.');
    }

    /**
     * Return an array of Kaduna State LGAs.
     */
    private function getKadunaLGAs()
    {
        return [
            'Birnin Gwari'   => 'Birnin Gwari',
            'Chikun'         => 'Chikun',
            'Giwa'           => 'Giwa',
            'Igabi'          => 'Igabi',
            'Ikara'          => 'Ikara',
            "Jema'a"         => "Jema'a",
            'Kachia'         => 'Kachia',
            'Kaduna North'   => 'Kaduna North',
            'Kaduna South'   => 'Kaduna South',
            'Kagarko'        => 'Kagarko',
            'Kajuru'         => 'Kajuru',
            'Kaura'          => 'Kaura',
            'Kauru'          => 'Kauru',
            'Kubau'          => 'Kubau',
            'Kudan'          => 'Kudan',
            'Lere'           => 'Lere',
            'Makarfi'        => 'Makarfi',
            'Sabon Gari'     => 'Sabon Gari',
            'Sanga'          => 'Sanga',
            'Soba'           => 'Soba',
            'Zangon Kataf'   => 'Zangon Kataf',
            'Zaria'          => 'Zaria',
        ];
    }
}
