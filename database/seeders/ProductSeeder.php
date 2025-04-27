<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // přidáme pro generování náhodného SKU

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Aloe Vera',
                'description' => 'Léčivá sukulentní rostlina s minimálními nároky na péči.',
                'price' => 150,
                'category' => 'Sukulenty',
            ],
            [
                'name' => 'Kaktus Mammillaria',
                'description' => 'Malý kaktus ideální do bytu, kvete krásnými kvítky.',
                'price' => 120,
                'category' => 'Kaktusy',
            ],
            [
                'name' => 'Levandule',
                'description' => 'Vonná bylina vhodná na balkón i zahradu.',
                'price' => 90,
                'category' => 'Bylinky',
            ],
            [
                'name' => 'Areca palma',
                'description' => 'Dekorativní palma vhodná do interiéru.',
                'price' => 600,
                'category' => 'Palmy',
            ],
            [
                'name' => 'Rozmarýn',
                'description' => 'Bylina s typickou vůní, skvělá do kuchyně.',
                'price' => 70,
                'category' => 'Bylinky',
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category' => $product['category'],
                'sku' => strtoupper(Str::random(8)), // náhodné SKU, třeba: ABCD1234
                'in_stock' => rand(1, 50), // náhodné množství skladem
            ]);
        }
    }
}
