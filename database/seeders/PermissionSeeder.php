<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $permissions=[
      'إدارة الأصناف',
      'إدارة الطرود',
      'إدارة الأدوار',
      'إدارة الصلاحيات',
      'طلبات الشحن',
      'إدارة بيانات الموظفين',
  'إدارة العملاء',
'إدارة الشاحنات'];
      foreach($permissions as $permission){
          Permission::create( [ 'name'=>$permission] );
      }

    }
}
