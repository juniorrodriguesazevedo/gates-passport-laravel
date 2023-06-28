<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Product 1'],
            ['name' => 'Product 2'],
            ['name' => 'Product 3'],
            ['name' => 'Product 4'],
            ['name' => 'Product 5'],
            ['name' => 'Product 6'],
            ['name' => 'Product 7'],
            ['name' => 'Product 8'],
            ['name' => 'Product 9'],
            ['name' => 'Product 10'],
        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
