<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        // Blog Permission
        Permission::create(['name' => 'view.blog']);

        // Users Permission
        Permission::create(['name' => 'manage.users']);

        // Permisssion 
        Permission::create(['name' => 'manage.permissions']);

        // Mail Permission
        Permission::create(['name' => 'view.mail']);
        Permission::create(['name' => 'manage.mail']);
        Permission::create(['name' => 'summary.mail']);
        */
        
        // Documents 
        Permission::create(['name' => 'view.documents']);

    }
}