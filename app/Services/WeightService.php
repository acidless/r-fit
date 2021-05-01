<?php

namespace App\Services;

use App\Models\Weight;

class WeightService
{
    public function addWeight($userId, $amount)
    {
        return Weight::query()->create([
            "amount" => $amount,
            "user_id" => $userId,
        ]);
    }
}
