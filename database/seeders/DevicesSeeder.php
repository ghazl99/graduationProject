<?php

namespace Database\Seeders;

use App\Models\CategoryDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      $devices=[
        'شاشة حاسب',
        'لابتوب',
        'ايباد أو تاب',
        'ماوس',
        'حقيبة لابتوب',
        'جوال',
        'الة تصوبر أو فاكس',
        'طرد يحوي 20 راوتر'
      ];
      $device_price=[
        '16000',
        '25000',
        '20000',
        '5000',
        '12000',
        '20000',
        '60000',
        '40000'
      ];
      foreach ($devices as $k => $device) {
        CategoryDetail::create([
          'category_id'=>1,
          'type'=>$device,
          'price'=>$device_price[$k]
        ]);
      }
    }
}
