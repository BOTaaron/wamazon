<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'Administrator')->first();

        User::create([
            'name' => 'Aaron',
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(ENV('ADMIN_PASSWORD')),
            'role_id' => $adminRole->id,
        ]);
    }
}
