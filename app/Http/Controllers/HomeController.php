<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MiningSite;
use App\Models\TaxProfile;
use App\Models\AgentAssignment;
use App\Models\Payment;
use App\Services\CommissionService;



class HomeController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole(['Admin', 'Super Admin', 'Manager'])) {
            return view('dashboard', [
                'numAgents' => User::role('Agent')->count(),
                'numMiningSites' => MiningSite::count(),
                'numTaxProfiles' => TaxProfile::count(),
            ]);
        }

        if ($user->hasRole('Agent')) {
            $assignment = AgentAssignment::where('user_id', $user->id)->latest()->first();

            return view('dashboard', [
                'assignedPOS' => optional($assignment->posMachine)->device_id,
                'totalCollected' => Payment::where('user_id', $user->id)->sum('amount'),
                'totalTransactions' => Payment::where('user_id', $user->id)->count(),
                'commission' => CommissionService::calculateForAgent($user->id),
            ]);
        }

        if ($user->hasRole('tax-payer')) {
            return view('dashboard');
        }

        abort(403);
    }
}
