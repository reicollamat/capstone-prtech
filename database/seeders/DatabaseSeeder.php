<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed an 'admin' role
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Admin',
            'permissions' => '{"platform.index": "1", "platform.systems.roles": "1", "platform.systems.users": "1", "platform.systems.attachment": "1"}',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // seed an 'regular user' role
        DB::table('roles')->insert([
            'slug' => 'regular_user',
            'name' => 'Regular User',
            'permissions' => '{"platform.index": "0", "platform.systems.roles": "0", "platform.systems.users": "0", "platform.systems.attachment": "0"}',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // seed an admin user
        User::factory()->create([
            'name' => 'admin',
            'first_name' => 'Ray Eroll',
            'last_name' => 'CollamatTadique',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1'),
            'phone_number' => fake()->phoneNumber(),
            'street_address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->country(),
            'permissions' => [
                "platform.index" => true, 
                "platform.systems.roles" => true,
                "platform.systems.users" => true,
                "platform.systems.attachment" => true,
            ],
        ]);

        // seed role_users table

        // seed regular users
        User::factory()
            ->count(3)
            ->create();

        // seed dataset
        $this->call([
            ComputerCaseSeeder::class,
            CaseFanSeeder::class,
            CpuSeeder::class,
            CpuCoolerSeeder::class,
            ExtStorageSeeder::class,
            IntStorageSeeder::class,
            HeadphoneSeeder::class,
            KeyboardSeeder::class,
            MemorySeeder::class,
            MonitorSeeder::class,
            MotherboardSeeder::class,
            MouseSeeder::class,
            PsuSeeder::class,
            SpeakerSeeder::class,
            VideoCardSeeder::class,
            WebcamSeeder::class,
        ]);

        // Product::factory()
        //     ->count(5)
        //     ->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
