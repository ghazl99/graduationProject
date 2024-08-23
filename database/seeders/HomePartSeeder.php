<?php

namespace Database\Seeders;

use App\Models\CategoryDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $items=[
        'غسالة أو فرن غاز',
        'براد صغير 11 قدم وما دون ',
        'براد كبير فوق 11 قدم ',
        'جهاز رياضة للمشي',
        'طاولة حاسوب',
        'دراجة ناربة أو كهربائية',
        'كرسي بلاستيك',
        'مدفأة كهربائية أو مروحة صغيرة',
        'مدفأة كهربائية أو مروحة كبيرة',
        'مدفأة مازوت صالون أو شوفاج كهربائي',
        'مايكرووف',
        'كولار',
        'مكيف مؤلف من قطعتين',
        'مكيف مؤلف من ثلاث قطع',
        'دراجة هوائية',
        'فرشة اسفنج صغيرة',
        'فرشة مفردة سليب كمفورت',
        'فرشة مزدوجة سليب كمفورت',
        'شاشة LCD أو تلفزيون قياس 21 بوصة وما دون',
        'شاشة LCD أو تلفزيون قياس 32 بوصة',
        'شاشة LCD أو تلفزيون قياس 32 بوصة حتى 50 بوصة',


      ];
      $item_price=[
        '75000',
        '75000',
        '200000',
        '55000',
        '25000',
        '100000',
        '15500',
        '15000',
        '25000',
        '40000',
        '26000',
        '28000',
        '35000',
        '50000',
        '26000',
        '20000',
        '40000',
        '50000',
        '16000',
        '28000',
        '42000',

      ];
      foreach ($items as $k => $item) {
        CategoryDetail::create([
          'category_id'=>5,
          'type'=>$item,
          'price'=>$item_price[$k]
        ]);
      }
    }
}
