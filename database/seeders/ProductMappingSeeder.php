<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductMapping;

class ProductMappingSeeder extends Seeder
{
    private $productMappings = [
        // under 25 (age=1) and single (marital_status=1)
        [
            'product_id' => '1',
            'age' => '1',
            'marital_status' => '1',
        ],
        [
            'product_id' => '2',
            'age' => '1',
            'marital_status' => '1',
        ],
        [
            'product_id' => '3',
            'age' => '1',
            'marital_status' => '1',
        ],
        [
            'product_id' => '4',
            'age' => '1',
            'marital_status' => '1',
        ],

        // 25-50 (age=2) and single (marital_status=1)
        [
            'product_id' => '5',
            'age' => '2',
            'marital_status' => '1',
        ],
        [
            'product_id' => '6',
            'age' => '2',
            'marital_status' => '1',
        ],
        [
            'product_id' => '7',
            'age' => '2',
            'marital_status' => '1',
        ],
        [
            'product_id' => '8',
            'age' => '2',
            'marital_status' => '1',
        ],

        // over 50 (age=3) and single (marital_status=1)
        [
            'product_id' => '5',
            'age' => '3',
            'marital_status' => '1',
        ],
        [
            'product_id' => '6',
            'age' => '3',
            'marital_status' => '1',
        ],
        [
            'product_id' => '9',
            'age' => '3',
            'marital_status' => '1',
        ],
        [
            'product_id' => '10',
            'age' => '3',
            'marital_status' => '1',
        ],

        // under 25 (age=1) and married (marital_status=2)
        [
            'product_id' => '5',
            'age' => '1',
            'marital_status' => '2',
        ],
        [
            'product_id' => '6',
            'age' => '1',
            'marital_status' => '2',
        ],
        [
            'product_id' => '11',
            'age' => '1',
            'marital_status' => '2',
        ],
        [
            'product_id' => '12',
            'age' => '1',
            'marital_status' => '2',
        ],

        // 25-50 (age=2) and married (marital_status=2)
        [
            'product_id' => '13',
            'age' => '2',
            'marital_status' => '2',
        ],
        [
            'product_id' => '14',
            'age' => '2',
            'marital_status' => '2',
        ],
        [
            'product_id' => '9',
            'age' => '2',
            'marital_status' => '2',
        ],
        [
            'product_id' => '10',
            'age' => '2',
            'marital_status' => '2',
        ],

        // over 50 (age=3) and married (marital_status=
        [
            'product_id' => '15',
            'age' => '3',
            'marital_status' => '2',
        ],
        [
            'product_id' => '16',
            'age' => '3',
            'marital_status' => '2',
        ],
        [
            'product_id' => '17',
            'age' => '3',
            'marital_status' => '2',
        ],
        [
            'product_id' => '18',
            'age' => '3',
            'marital_status' => '2',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->productMappings as $productMapping)
        {
            ProductMapping::create($productMapping);
        }
    }
}
