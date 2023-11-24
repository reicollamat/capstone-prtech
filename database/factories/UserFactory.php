<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('fil_PH')->userName(),
            'first_name' => fake('fil_PH')->firstName(),
            'last_name' => fake('fil_PH')->lastName(),
            'email' => fake('fil_PH')->unique()->safeEmail(),
            'birthdate' => fake('fil_PH')->date(),
            'sex' => fake('fil_PH')->randomElement(['male', 'female']),
            'email_verified_at' => now(),
            'password' => Hash::make('1'),
            'phone_number' => fake('fil_PH')->phoneNumber(),
            'street_address_1' => fake('fil_PH')->streetAddress(),
            'state_province' => fake()->randomElement(['Metro Manila', 'Cavite', 'Bulacan', 'Laguna', 'Batangas', 'Rizal', 'Pampanga', 'Quezon', 'Nueva Ecija', 'Zambales', 'Tarlac', 'Benguet', 'Pangasinan', 'Iloilo', 'Leyte', 'Cebu', 'Negros Occidental', 'Davao del Sur', 'Maguindanao', 'Lanao del Norte']),
            'city' => fake('fil_PH')->city(),
            'postal_code' => fake('fil_PH')->postcode(),
            'country' => 'Phillipines',
            'permissions' => [
                'platform.index' => '0',
                'platform.systems.roles' => '0',
                'platform.systems.users' => '0',
                'platform.systems.attachment' => '0',
            ],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
