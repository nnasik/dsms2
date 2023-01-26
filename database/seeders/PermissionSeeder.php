<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users Permission
        Permission::create(['name' => 'manage.users']);

        // Permisssion 
        Permission::create(['name' => 'manage.permissions']);

        // Mail Permission
        Permission::create(['name' => 'view.mail']);
        Permission::create(['name' => 'manage.mail']);
        Permission::create(['name' => 'summary.mail']);

        $su = User::find('922392048V');

        $su->givePermissionTo('manage.users');
        $su->givePermissionTo('manage.permissions');
    }
}
