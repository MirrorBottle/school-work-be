<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'Pegawai',
            'Pengguna'
        ];

        for ($i = 0; $i < count($roles); $i++) {
            DB::table('roles')->insert([
                'name' => $roles[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
