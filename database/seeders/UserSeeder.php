<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 4; $i++) {
            $data[] = [
                'name' => "toainguyen150" . $i,
                'email' => "toainguyen150" . $i . '@gmail.com',
                'password' => Hash::make('Tt123456'),

                // 'status' => $i % 2,
                'level' => 0
            ];
        }

        DB::table('users')->insert($data);
    }
}
