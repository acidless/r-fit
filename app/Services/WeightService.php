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
            ->orderByDesc("created_at")
            ->paginate(5);
    }

    public function addWeight($userId, $amount)
    {
        return Weight::query()->create([
            "amount" => $amount,
            "user_id" => $userId,
        ]);
    }

    public function deleteWeight($userId, $weightId)
    {
        $weight = Weight::query()
            ->where("user_id", "=", $userId)
            ->find($weightId);

        if ($weight) {
            $weight->delete();
            return $weight;
        }
    }
}
