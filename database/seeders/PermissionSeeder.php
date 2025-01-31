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
        $su = User::find('922392048V');
        $su->status = 'active';
        $su->save();
        $su->givePermissionTo('manage.users');
        $su->givePermissionTo('manage.permissions');
    }
}
