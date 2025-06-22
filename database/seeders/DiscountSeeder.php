<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            foreach ([25, 25, 40, 40] as $percent) {
                Discount::create([
                    'user_id' => $user->id,
                    'code' => strtoupper('COIN' . $percent . '-' . uniqid($user->id . '-')),
                    'percentage' => $percent,
                    'used' => false,
                ]);
            }
        }
    }
}
