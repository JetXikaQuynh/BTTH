<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Issue;
use App\Models\Computer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Issue::class;

    public function definition(): array
    {
        return [
            'computer_id' => Computer::factory(), // Tạo một máy tính mẫu cho mỗi issue
            'reported_by' => $this->faker->name,
            'reported_date' => $this->faker->dateTimeThisYear(),
            'description' => $this->faker->paragraph,
            'urgency' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
