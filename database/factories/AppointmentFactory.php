<?php

namespace Database\Factories;

use App\Models\AnimalType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'animal_type_id' => AnimalType::inRandomOrder()->first()->id,
            'animal_name' => fake()->name,
            'animal_age' => fake()->numberBetween(1,10),
            'symptoms' => fake()->text(),
            'appointment_date' => fake()->dateTime->format('Y-m-d'),
            'appointment_period' => 'afternoon'
        ];
    }
}
