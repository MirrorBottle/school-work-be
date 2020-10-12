<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
