<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'category'          => 'makanan',
        ]);
        DB::table('category')->insert([
            'category'          => 'minuman',
        ]);
        DB::table('category')->insert([
            'category'          => 'snack',
        ]);
    }
}
