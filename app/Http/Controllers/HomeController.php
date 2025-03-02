<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MiningSite;
use App\Models\TaxProfile;


class HomeController extends Controller
{

    public function index()
    {
        $numAgents = User::role('Agent')->count(); // Counting users with the role 'Agent'
        $numMiningSites = MiningSite::count();
        $numTaxProfiles = TaxProfile::count();

        return view('dashboard', compact('numAgents', 'numMiningSites', 'numTaxProfiles'));
    }
}
