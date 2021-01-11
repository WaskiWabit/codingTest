<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discounts;

class DiscountSeeder extends Seeder
{
    private $discounts = [
        [
            'name' => 'UTM',
            'description' => '20% Off',
            'code' => 'youtube',
            'amount_percentage' => '0.2',
        ],
        [
            'name' => 'Hemisphere',
            'description' => '10% Off',
            'code' => 'northern',
            'amount_percentage' => '0.1',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->discounts as $discount)
        {
            Discounts::create($discount);
        }
    }
}
