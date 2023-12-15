<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
// 'المنتجات',
// 'قائمة المنتجات',
// 'المنتجات',
'التقارير',
'الفواتير',
'قائمة الفواتير',
'المستخدمين',
'قائمة المستخدمين',
'صلاحيات المستخدمين',
'الاعدادات',
'اضافة اقسام',
'اضافة منتجات'

];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}
