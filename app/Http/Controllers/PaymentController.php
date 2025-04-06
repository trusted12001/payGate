<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxProfile;
use App\Models\RevenueSetting;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\MineralDeposit;
use App\Models\MiningSite;

class PaymentController extends Controller
{
    // Display payment history
    public function history()
    {
        $payments = Payment::where('id', Auth::id())->latest()->get();
        return view('payments.history', compact('payments'));
    }

    // Show mining profiles linked to the logged-in user
    public function selectProfile()
    {
        $profiles = TaxProfile::where('user_id', Auth::id())->get();
        return view('payments.select', compact('profiles'));
    }

    // Load payment page for selected profile
    public function makePayment(TaxProfile $profile)
    {
        // // Debugging: Log Profile ID
        // \Log::info("Making payment for Profile ID: " . $profile->id);

        // // Fetch revenue settings for the selected mineral
        // $revenueSettings = RevenueSetting::whereHas('mineralDeposit', function ($query) use ($profile) {
        //     $query->where('mineral_id', 2);
        // })->first();

        // // If no revenue setting is found, redirect with error message
        // if (!$revenueSettings) {
        //     \Log::error("Revenue setting not found for tax category: " . $profile->tax_category);
        //     return back()->with('error', 'Revenue setting not found for the selected tax category.');
        // }

        // return view('payments.make', compact('profile', 'revenueSettings'));



        {
            // Fetching mineral deposits, mining sites, and revenue settings from the database
            $mineralDeposits = MineralDeposit::all();
            $miningSites = MiningSite::all();
            $taxCategories = [
                'Royalty', 'Corporate Income Tax', 'Indirect Tax',
                'Licensing Fees', 'Surface Right Fees',
                'Environmental Fees', 'Production Sharing'
            ];

            $revenueSettings = RevenueSetting::all();

            $unitPrices = [];

            foreach ($revenueSettings as $setting) {
                $unitPrices[$setting->mineral_id] = [
                    'gram' => $setting->per_gram,
                    'kg' => $setting->per_kg,
                    'bag' => $setting->per_bag,
                    'ton' => $setting->per_ton,
                    'truck' => $setting->per_truck,
                ];
            }

            $mineralNameMap = $mineralDeposits->pluck('mineral_name', 'id');
            return view('payments.make', compact(
                'mineralDeposits',
                'miningSites',
                'taxCategories',
                'unitPrices',
                'mineralNameMap'
            ));
        }
    }


    // Process payment
    public function processPayment(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:tax_profiles,id',
            'payment_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|in:POS,Online,Agent',
        ]);



        Payment::create([
            'user_id' => Auth::id(),
            'profile_id' => $request->profile_id,
            'amount' => $request->payment_amount,
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
        ]);

        return redirect()->route('payments.history')->with('success', 'Payment recorded successfully.');
    }

    // Print receipt
    public function printReceipt($id)
    {
        $payment = Payment::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('payments.receipt', compact('payment'));
    }


    //For Mock Payment
    public function showPreview(Request $request)
    {
        $data = $request->validate([
            'mineralDeposit' => 'required|exists:mineral_deposits,id',
            'miningSite' => 'required|exists:mining_sites,id',
            'taxCategory' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'unit' => 'required|string',
            'totalAmount' => 'required|numeric',
        ]);

        $mineral = \App\Models\MineralDeposit::find($data['mineralDeposit']);
        $site = \App\Models\MiningSite::find($data['miningSite']);

        return view('payments.preview', compact('data', 'mineral', 'site'));
    }

    public function paymentSuccess()
    {
        return view('payments.success');
    }


}
