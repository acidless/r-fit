<?php

namespace App\Services;

use App\Models\User;
use App\Models\Weight;

class WeightService
{
    public function getWeightData($userId)
    {
        return User::query()
            ->find($userId)
            ->weight()
            ->get()
            ->sortByDesc("created_at");
    }

    public function addWeight($userId, $amount)
    {
        return Weight::query()->create([
            "amount" => $amount,
            "user_id" => $userId,
        ]);
    }
}
