<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepositsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('deposits')->insert([
                'user_id' => mt_rand(1, 3),
                'total_deposit' => mt_rand(1, 10),
                'deposit_date' => Carbon::createFromDate(date('Y'), mt_rand(1, date('m')), mt_rand(1, date('d'))),
                'is_main_savings' => 0,
                'status' => mt_rand(0, 2),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
