<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name"=>"IT Support",
            "landing_page"=>"/",
        ]);
        Role::create([
            "name"=>"Pelanggan",
            "landing_page"=>"/transaksi/add",
        ]);
    }
}
