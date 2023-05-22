<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::insert([
                    [
                        'name'      => 'Checks Direct',
                        'email'     => 'admin@checksdirect.com',
                        'password'  => Hash::make('checksdirect@1234'),
                        'api_key'   => Str::random(30)
                    ],
                    [
                        'name'      => 'New Directions',
                        'email'     => 'admin@newdirections.com',
                        'password'  => Hash::make('newdirections@1234'),
                        'api_key'   => Str::random(30)
                    ],
                    [
                        'name'      => 'Test Company',
                        'email'     => 'admin@testcompany.com',
                        'password'  => Hash::make('testcompany@1234'),
                        'api_key'   => Str::random(30)
                    ],
                    [
                        'name'      => 'Demo Company',
                        'email'     => 'admin@democompany.com',
                        'password'  => Hash::make('democompany@1234'),
                        'api_key'   => Str::random(30)
                    ]
        ]);
    }
}
