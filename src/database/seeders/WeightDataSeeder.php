<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WeightDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1名のユーザーを作成
        $user = User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // 目標体重を1件作成
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => 65.0,
        ]);

        // 体重ログを35件作成
        WeightLog::factory(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
