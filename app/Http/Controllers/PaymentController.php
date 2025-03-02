<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxProfile;
use App\Models\RevenueSetting;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

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
        // Debugging: Log Profile ID
        \Log::info("Making payment for Profile ID: " . $profile->id);

        // Fetch revenue settings for the selected mineral
        $revenueSettings = RevenueSetting::whereHas('mineralDeposit', function ($query) use ($profile) {
            $query->where('mineral_name', $profile->tax_category);
        })->first();

        // If no revenue setting is found, redirect with error message
        if (!$revenueSettings) {
            \Log::error("Revenue setting not found for tax category: " . $profile->tax_category);
            return back()->with('error', 'Revenue setting not found for the selected tax category.');
        }

        return view('payments.make', compact('profile', 'revenueSettings'));
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
}
