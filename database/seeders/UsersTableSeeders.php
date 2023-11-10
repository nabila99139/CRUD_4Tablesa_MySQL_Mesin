<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin'
            ], [
                'name' => 'super admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'super admin'
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }

        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'role' => 'admin'
        // ],[
        //     'name' => 'super admin',
        //     'email' => 'super_admin@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'role' => 'super admin'
        // ]);
    }
}
