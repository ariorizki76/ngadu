<?php

use Illuminate\Database\Seeder;
use App\Desa;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Desa::create(['lokasi' => 'Cigadung']);
       Desa::create(['lokasi' => 'Dangdeur']);
       Desa::create(['lokasi' => 'Karanganyar']);
       Desa::create(['lokasi' => 'Parung']);
       Desa::create(['lokasi' => 'Pasirkareumbi']);
       Desa::create(['lokasi' => 'Soklat']);
       Desa::create(['lokasi' => 'Sukamelang']);
       Desa::create(['lokasi' => 'Wanareja']);
    }
}
