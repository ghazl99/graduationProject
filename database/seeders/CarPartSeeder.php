<?php

namespace Database\Seeders;

use App\Models\CategoryDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $cars=[
        'باب سيارة أو طبون سيارة',
        'دولاب سيارة صغيرة بدون جنط',
        'دولاب سيارة وسط بدون جنط',
        'دولاب سيارة كبير بدون جنط',
        'دولاب سيارة كبير مع جنط',
        'غطاء محرك سيارة',
        'محرك سيارة بنزين',
        'رفراف سيارة'
      ];
      $car_price=[
        '35000',
        '15000',
        '17000',
        '20000',
        '50000',
        '30000',
        '100000',
        '30000'
      ];
      foreach ($cars as $k => $car) {
        CategoryDetail::create([
          'category_id'=>6,
          'type'=>$car,
          'price'=>$car_price[$k]
        ]);
      }
    }
}
