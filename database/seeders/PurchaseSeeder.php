<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            Purchase1Seeder::class,
            Purchase2Seeder::class,
            Purchase3Seeder::class,
            Purchase4Seeder::class,
            Purchase5Seeder::class,
            Purchase6Seeder::class,
            Purchase7Seeder::class,
        ]);
    }
}
