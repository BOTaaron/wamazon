<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Administrator', 'description' => 'Permissions to modify aspects of website such as store items and bulletin content.'],
            ['name' => 'Seller', 'description' => 'Access to add and modify store items'],
            ['name' => 'Customer', 'description' => 'Access to view and buy items'],
        ]);
    }
}
