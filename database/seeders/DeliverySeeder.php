<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $delivery1= Delivery::create([
            'title' => 'თბილისი',
            'created_at' => now(),
        ]);
       $delivery1->prices()->create([
           'price' => 5
       ]);


        $delivery2=  Delivery::create([
            'title' => 'რეგიონი',
            'created_at' => now(),
        ]);
        $delivery2->prices()->create([
            'price' => 10
        ]);
    }
}
