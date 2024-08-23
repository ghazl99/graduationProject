<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        Role::create( [ 'name'=>'المشرف' ] )->givePermissionTo(Permission::all());
        Role::create( [ 'name'=>'موظف إدارة الشحن' ] )->givePermissionTo(['طلبات الشحن','إدارة العملاء']);
        Role::create(['name'=>'موظف خدمات'])->givePermissionTo(['إدارة الأصناف','إدارة الطرود']);
        Role::create(['name'=>'موظف خدمات اللوجستية'])->givePermissionTo(['إدارة الشاحنات']);
        Role::create( [ 'name'=>'العميل' ] );
        Role::create( [ 'name'=>'السائق' ] );

    }
}
