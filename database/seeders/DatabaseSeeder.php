<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creating products
        Product::factory()
            ->count(100)
            ->create();

        // creating users with owned cart
        User::factory()
            ->count(10)
            ->create()
            ->each(function ($user) {
                // choose random products by user
                $products = Product::inRandomOrder()->limit(3)->get();
                $cart = $user->cart()->create();
                $total = 0;
                $quantity = fake()->numberBetween(1,5);

                $productData = [];
                foreach ($products as $product) {
                    $productData[$product->id] = [
                        'quantity' => $quantity,
                        'price' => $product->price,
                    ];
                }
                // added products for user cart
                $cart->products()->attach($productData);
                // added total price for user cart
                $total = $products->sum('price') * $quantity;
                $cart->update(['total_price' => $total]);
            });

    }
}
