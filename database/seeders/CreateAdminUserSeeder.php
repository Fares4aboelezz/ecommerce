<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    //دى الحاجات الديفلت التى تدخل جوه الداتابيز علطول علشان اما تنفذ السيدر يضيف الحاجات ديه ويحطلة الصلاحية بتاعه
$user = User::create([
'name' => 'fares',
'email' => 'faris@gmail.com',
'password' => bcrypt('123456'),
'phone'=>'01112234687',
'roles_name'=>'admin',
'status'=>'مفعل'
]);
$role = Role::create(['name' => 'Admin']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);
}
}