<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPassword = "123123";
        $users = [
            [
                'name'=>'Vendedor 1',
                'email'=>'vendedor1@test.com',
                'password'=>Hash::make($defaultPassword),

            ],
            [
                'name'=>'Vendedor 2',
                'email'=>'vendedor2@test.com',
                'password'=>Hash::make($defaultPassword),

            ],
            [
                'name'=>'Vendedor 3',
                'email'=>'vendedor3@test.com',
                'password'=>Hash::make($defaultPassword),

            ],
            [
                'name'=>'Vendedor 4',
                'email'=>'vendedor4@test.com',
                'password'=>Hash::make($defaultPassword),

            ]
        ];
        foreach ($users as $u) {
            User::create($u);
        }
    }
}
