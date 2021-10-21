<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Daniel Uribe',
            'email' => 'kasashop@gmail.com',
            'password' => bcrypt('Chivas1314.')
        ])->assignRole('admin');
    }
}
