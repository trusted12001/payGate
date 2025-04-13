<?php

namespace App\Services;

use App\Models\Payment;

class CommissionService
{
    /**
     * Calculate total commission earned by an agent.
     *
     * @param int $userId
     * @param float $rate
     * @return float
     */
    public static function calculateForAgent(int $userId, float $rate = 0.10): float
    {
        $total = Payment::where('user_id', $userId)->sum('amount');
        return $total * $rate;
    }
}
