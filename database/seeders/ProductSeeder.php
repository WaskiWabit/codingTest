<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    private $products = [
        [
            'name' => 'Sport',
            'description' => 'A sporty car.',
            'model' => 'C_A1',
            'img_url' => 'images/C_A1.jpg',
            'price' => '25300.99',
        ],
        [
            'name' => 'Sport',
            'description' => 'A sporty car.',
            'model' => 'C_A2',
            'img_url' => 'images/C_A2.jpg',
            'price' => '63000.35',
        ],
        [
            'name' => 'Jet Boat',
            'description' => 'A very fast boat.',
            'model' => 'B_A1',
            'img_url' => 'images/B_A1.jpg',
            'price' => '34999.99',
        ],
        [
            'name' => 'Jet Boat',
            'description' => 'A very fast boat.',
            'model' => 'B_A2',
            'img_url' => 'images/B_A2.jpg',
            'price' => '82400.50',
        ],
        [
            'name' => 'Sedan',
            'description' => 'A very sleek sedan.',
            'model' => 'C_B1',
            'img_url' => 'images/C_B1.jpg',
            'price' => '14000.99',
        ],
        [
            'name' => 'Sedan',
            'description' => 'A very sleek sedan.',
            'model' => 'C_B2',
            'img_url' => 'images/C_B2.jpg',
            'price' => '74000.00',
        ],
        [
            'name' => 'Bow Rider',
            'description' => 'A nice looking boat.',
            'model' => 'B_B1',
            'img_url' => 'images/B_B1.jpg',
            'price' => '12000.99',
        ],
        [
            'name' => 'Bow Rider',
            'description' => 'A nice looking boat.',
            'model' => 'B_B2',
            'img_url' => 'images/B_B2.jpg',
            'price' => '71300.00',
        ],
        [
            'name' => 'Cabin Cruiser',
            'description' => 'A nice looking boat.',
            'model' => 'B_D1',
            'img_url' => 'images/B_D1.jpg',
            'price' => '31250.99',
        ],
        [
            'name' => 'Cabin Cruiser',
            'description' => 'A nice looking boat.',
            'model' => 'B_D2',
            'img_url' => 'images/B_D2.jpg',
            'price' => '57500.00',
        ],
        [
            'name' => 'Cuddy',
            'description' => 'A nice looking boat.',
            'model' => 'B_C1',
            'img_url' => 'images/B_C1.jpg',
            'price' => '43500.00',
        ],
        [
            'name' => 'Cuddy',
            'description' => 'A nice looking boat.',
            'model' => 'B_C2',
            'img_url' => 'images/B_C2.jpg',
            'price' => '63400.00',
        ],
        [
            'name' => 'Minivan',
            'description' => 'A cool van for the whole family.',
            'model' => 'C_C1',
            'img_url' => 'images/C_C1.jpg',
            'price' => '18500.00',
        ],
        [
            'name' => 'Minivan',
            'description' => 'A cool van for the whole family.',
            'model' => 'C_C2',
            'img_url' => 'images/C_C2.jpg',
            'price' => '51000.99',
        ],
        [
            'name' => 'SUV',
            'description' => 'An SUV that you can roll in style.',
            'model' => 'C_D1',
            'img_url' => 'images/C_D1.jpg',
            'price' => '47500.00',
        ],
        [
            'name' => 'SUV',
            'description' => 'An SUV that you can roll in style.',
            'model' => 'C_D2',
            'img_url' => 'images/C_D2.jpg',
            'price' => '108000.99',
        ],
        [
            'name' => 'Runabout',
            'description' => 'A very comfy boat.',
            'model' => 'B_E1',
            'img_url' => 'images/B_E1.jpg',
            'price' => '27500.00',
        ],
        [
            'name' => 'Runabout',
            'description' => 'A very comfy boat.',
            'model' => 'B_E2',
            'img_url' => 'images/B_E2.jpg',
            'price' => '53250.00',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->products as $product)
        {
            Products::create($product);
        }
    }
}
