<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipmentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $categories=['الأجهزة الإلكترونية ','أدوية','مواد غذائية','ملابس','الأجهزة المنزلية','قطع سيارة'];
      $images=[
        'electronic.jpg',
        'medicine.jpg',
        'food.jpg',
        'clothing.jpg',
      'home.jpg',
    'car.jpg'];

        foreach ($categories as $k => $category) {
          ShipmentCategory::create( [
            'category_name' => $category,
            'photo' => $images[$k]
                    ] );        }

    }
}
