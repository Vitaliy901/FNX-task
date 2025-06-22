<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
        ->count(10)
        ->create();

        Product::factory()->count(100)->create();

/*        $this->call([
            UserFactory::class
            ]);*/

/*        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

    }
}
