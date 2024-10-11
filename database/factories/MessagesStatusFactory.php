<?php

namespace Database\Factories;
use App\Models\Messages;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessagesStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message_id' => Messages::factory(),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['sent', 'delivered', 'read']),
        ];
    }
}
