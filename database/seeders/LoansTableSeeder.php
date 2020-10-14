<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loans')->insert([
            'user_id' => mt_rand(1, 28),
            'employee_id' => mt_rand(1, 28),
            'start_date' => Carbon::createFromDate(date('Y'), mt_rand(1, 6), mt_rand(1, date('d'))),
            'due_date' => Carbon::createFromDate(date('Y'), mt_rand(6, 12), mt_rand(1, date('d'))),
            'total_loan' => 1000000,
            'total_payment' => 500000,
            'payment_counts' => 2,
            'status' => 0,
            'is_approve' => 0,
            'loan_date' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('loans')->insert([
            'user_id' => mt_rand(1, 28),
            'employee_id' => mt_rand(1, 28),
            'start_date' => Carbon::createFromDate(date('Y'), mt_rand(1, 6), mt_rand(1, date('d'))),
            'due_date' => Carbon::createFromDate(date('Y'), mt_rand(6, 12), mt_rand(1, date('d'))),
            'total_loan' => 5000000,
            'total_payment' => 10000000,
            'payment_counts' => 5,
            'status' => 1,
            'is_approve' => 0,
            'loan_date' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('loans')->insert([
            'user_id' => mt_rand(1, 28),
            'employee_id' => mt_rand(1, 28),
            'start_date' => Carbon::createFromDate(date('Y'), mt_rand(1, 6), mt_rand(1, date('d'))),
            'due_date' => Carbon::createFromDate(date('Y'), mt_rand(6, 12), mt_rand(1, date('d'))),
            'total_loan' => 20000000,
            'total_payment' => 5000000,
            'payment_counts' => 4,
            'status' => 2,
            'is_approve' => 1,
            'loan_date' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
