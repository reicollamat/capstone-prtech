<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerInformation>
 */
class SellerInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = 0;
        // for ($i = 0; $i < 20; $i++) {
        $user = User::find(rand(1, 299));
        // }

        return [
            'shop_name' => fake()->randomElement(['ByteBazaar', 'TechnoTronics', 'ChipMasters', 'CircuitSavvy', 'MegaByte Mart', 'PowerPC Plaza', 'LogicLinks', 'Pixel Palace', 'CyberSphere', 'Quantum Quest', 'Infotech Emporium', 'ElectroGeeks', 'TechTrove', 'Silicon Valley Store', 'ByteBlitz', 'MicroTech Hub', 'PC Planet', 'InnovateTech', 'Cybernaut Central', 'DataDreams Hub']),
            'registered_business_name' => $user->first_name.' '.$user->last_name,
            'shop_email' => $user->email,
            'shop_phone_number' => $user->phone_number,
            'shop_address' => $user->street_address_1,
            'shop_city' => $user->city,
            'shop_state_province' => $user->state_province,
            'shop_postal_code' => $user->postal_code,
            'registered_address' => $user->street_address_1,
            'registered_city' => $user->city,
            'registered_state_province' => $user->state_province,
            'registered_postal_code' => $user->postal_code,
            'seller_type' => 'Individual',
            'business_permit' => rand(1000000000, 9999999999),
            //reference of user id
            'user_id' => $user->id,
        ];
    }
}
