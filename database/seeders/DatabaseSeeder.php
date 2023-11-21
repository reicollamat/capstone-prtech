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
        // seed an 'admin' & 'regular_user' role
        DB::table('roles')->insert([
            [
                'slug' => 'admin',
                'name' => 'Admin',
                'permissions' => '{"platform.index": "1", "platform.systems.roles": "1", "platform.systems.users": "1", "platform.systems.attachment": "1"}',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'slug' => 'regular_user',
                'name' => 'Regular User',
                'permissions' => '{"platform.index": "0", "platform.systems.roles": "0", "platform.systems.users": "0", "platform.systems.attachment": "0"}',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        // seed an admin user
        $admin = User::factory()->create([
            'name' => 'admin',
            'first_name' => 'Ray Eroll',
            'last_name' => 'Collamat_Tadique',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1'),
            'phone_number' => fake()->phoneNumber(),
            'street_address_1' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->country(),
            'permissions' => [
                'platform.index' => true,
                'platform.systems.roles' => true,
                'platform.systems.users' => true,
                'platform.systems.attachment' => true,
            ],
        ]);

        // seed an regular user
        $user = User::factory()->create([
            'name' => 'user',
            'first_name' => 'Ray Eroll',
            'last_name' => 'Collamat_Tadique',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1'),
            'phone_number' => fake()->phoneNumber(),
            'street_address_1' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->country(),
            'permissions' => [
                'platform.index' => false,
                'platform.systems.roles' => false,
                'platform.systems.users' => false,
                'platform.systems.attachment' => false,
            ],
        ]);

        $user2 = User::factory()->create([
            'name' => 'richmondjohnbillones',
            'email' => 'mai@gmail.com',
            'password' => Hash::make('1'),
            'permissions' => [
                'platform.index' => false,
                'platform.systems.roles' => false,
                'platform.systems.users' => false,
                'platform.systems.attachment' => false,
            ],
        ]);

        $admin_role_id = DB::table('roles')->where('slug', 'admin')->value('id');
        $user_role_id = DB::table('roles')->where('slug', 'user')->value('id');

        // Insert the record into the role_users table
        DB::table('role_users')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ],
        ]);

        // seed 3 regular users
        // User::factory()
        //     ->count(3)
        //     ->create();

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
