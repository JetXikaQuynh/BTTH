<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Computer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_name' => $this->faker->word,
            'model' => $this->faker->word,
            'operating_system' => $this->faker->word,
            'processor' => $this->faker->word,
            'memory' => $this->faker->numberBetween(4, 64), // Giả lập bộ nhớ
            'available' => $this->faker->boolean, // Giả lập trạng thái có sẵn
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
