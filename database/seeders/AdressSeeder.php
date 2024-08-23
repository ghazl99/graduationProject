<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $s=[
        'حلب','حماة','حمص','دمشق','درعا','السويداء','الحسكة','الرقة','اللاذقية','القنيطرة','الطبقة','دير الزور','دمشق','طرطوس'
      ];
      foreach ($s as $city) {
        Address::create([
          'source'=>$city,
          'destination'=>$city
        ]);
      }
    }
}
