<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\user;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list=Permission::create(['name'=>"user.list"]);
        $user_create=permission::create(['name'=>"user.create"]);
        $user_view=permission::create(['name'=>"user.view"]);
        $user_delete=permission::create(['name'=>"user.delete"]);
        $user_update=permission::create(['name'=>"user.update"]);
        $admin_role=Role::create(['name'=>'admin']);

        $admin_role->givePermissionTo(
        [
            $user_create,
            $user_list,
            $user_update,
             $user_view,
            $user_delete,
        ]);
        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        $admin->givePermissionTo(
        [
            $user_create,
            $user_list,
            $user_update,
             $user_view,
            $user_delete,
        ]);
        $admin->assignRole($admin_role);

        $user_role=Role::create(['name'=>'user']);

        $user_role->givePermissionTo(
        [
            
            $user_list,
           
        ]);
        $user=User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        $user->assignRole($user_role);
    }
}
