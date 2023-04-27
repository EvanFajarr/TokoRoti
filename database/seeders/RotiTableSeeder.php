<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\roti;
class RotiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        roti::create([
            'nama'          => 'Roti Anjay',
            'foto'        => '',
            'desc'     => 'Harga enak  anjayy',
            'harga'         => 'Rp 155.000',
        ]);
    }
}
