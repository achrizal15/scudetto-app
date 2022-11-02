<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\RoleMenu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        $this->call(RoleSeeder::class);
        $this->call(MenuSeeder::class);
        foreach (Menu::all() as $key => $value) {
            RoleMenu::create(["menu_id"=>$value->id,"role_id"=>1,"type"=>"RW"]);
        }

    }
}
