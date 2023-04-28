<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'admin1',
            'email'        => 'admin1@gmail.com',
            'no'     => '089505549223',
            'alamat' => 'gunturan',
            'password'=>Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
