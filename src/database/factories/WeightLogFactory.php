<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeightLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'weight' => $this->faker->randomFloat(1, 50.0, 100.0),
            'calories' => $this->faker->numberBetween(1200, 3000),
            'exercise_time' => $this->faker->time('H:i:s'),
            'exercise_content' => $this->faker->randomElement([
                'ウォーキング',
                'ジョギング',
                '筋力トレーニング',
                'ヨガ',
                '水泳',
                'サイクリング',
                'ストレッチ',
                'ランニング'
            ]),
        ];
    }
}
