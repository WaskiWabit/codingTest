<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Upsells;

class UpsellSeeder extends Seeder
{
    private $upsells = [
        [
            'name' => 'Facebook',
            'description' => 'Upsell for FB',
            'code' => 'fb',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->upsells as $upsell)
        {
            Upsells::create($upsell);
        }
    }
}
