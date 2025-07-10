<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Kopi Arabika Toraja',
            'description' => 'Dikenal dengan rasa asam lembut dan aroma floral dari Aceh Gayo.',
            'category' => 'Arabika',
            'price' => 75000,
            'image' => 'toraja.jpg',
        ]);

        Product::create([
            'name' => 'Kopi Robusta Lampung',
            'description' => 'Kopi kuat dengan rasa pahit khas Robusta dari Lampung.',
            'category' => 'Robusta',
            'price' => 50000,
            'image' => 'ro.jpg',
        ]);

        Product::create([
            'name' => 'Kopi Blend Premium',
            'description' => 'Perpaduan Arabika dan Robusta terbaik, cocok untuk espresso.',
            'category' => 'Premium',
            'price' => 85000,
            'image' => 'premium.jpg',
        ]);
    }
}
