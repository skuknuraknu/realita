<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::firstOrCreate(['name' => 'admin']);
        $user1 = User::firstOrCreate(['username' => 'admin', 'password' => bcrypt('password'), 'unit_kerja' => 'admin']);
        $user1->assignRole($role1);

        $role2 = Role::firstOrCreate(['name' => 'operator']);
        $user2 = User::firstOrCreate(['username' => 'operator', 'password' => bcrypt('password'), 'unit_kerja' => 'operator']);
        $user2->assignRole($role2);

        $role3 = Role::firstOrCreate(['name' => 'verifikator']);
        $user3 = User::firstOrCreate(['username' => 'verifikator', 'password' => bcrypt('password'), 'unit_kerja' => 'verifikator']);
        $user3->assignRole($role3);

        $role4 = Role::firstOrCreate(['name' => 'visitor']);
        $user4 = User::firstOrCreate(['username' => 'visitor', 'password' => bcrypt('password'), 'unit_kerja' => 'visitor']);
        $user4->assignRole($role4);

    }
}
