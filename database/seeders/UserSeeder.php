<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user1 = User::create([
            'name' => 'Abolfazl',
            'email' => 'abolfazljafari563@gmail.com',
            'password' => \Hash::make('12345678'),

        ]);
        $user1->assignRole('chef');

        $user2 = User::create([
            'name' => 'Ali',
            'email' => 'alijafari@gmail.com',
            'password' => \Hash::make('12345678'),
        ]);
        $user2->assignRole('customer');

    }
}
