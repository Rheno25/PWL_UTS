<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = ['Skittles', 'Budweiser', 'Red Bull', 'Pringles', 'Coca-Cola', 'Pepsi', 'Reese', 'Cheetos', 'Mountain Dew', 'Snickers',
                'Doritos', 'KitKat', 'Sprite', 'Indomie', 'Samyang', 'ABC', 'Bango', 'Emina', 'Garnier', 'Axe'];
        $cate = ['Snack', 'Snack', 'Beverages', 'Snack', 'Beverages', 'Beverages', 'Snack', 'Snack', 'Beverages', 'Snack', 'Snack',
                 'Snack', 'Beverages', 'Foods', 'Foods', 'Foods', 'Foods', 'Skincare & Makeup', 'Skincare & Makeup', 'Skincare & Makeup', ];

        for($i=0; $i<20; $i++){
            DB::table('barangs')->insert([
                'stock_code'=> 'PRD'.rand(001, 100),
                'stock_name'=> $brand[$i],
                'stock_category' => $cate[$i],
                'price' => rand(4000, 50000),
                'qty' => rand(10, 100)
            ]);
        }

    }
}
