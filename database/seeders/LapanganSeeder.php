<?php

namespace Database\Seeders;

use App\Models\Lapangan;
use Illuminate\Database\Seeder;

class LapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lapangan::create([
            "name"=>"Lap 1",
            "ukuran"=>"500 * 500",
            "jenis"=>"Rumput",
            "warna"=>"Merah",
            "harga"=>150000
        ]);
    }
}
