<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function employees()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }

    public static function getLoanStatuses($loan)
    {
        if ($loan->status === 0 && $loan->is_approve === NULL) {
            return $status = 'Belum Divalidasi';
        } else if ($loan->status === 1 && $loan->is_approve === 1) {
            return $status = 'Lunas';
        } else if ($loan->status === 2 && $loan->is_approve === 1) {
            return $status = 'Belum Lunas';
        } else if ($loan->is_approve === 0) {
            return $status = 'Ditolak';
        }
    }

    public static function listOfLoans()
    {
        $loans = Loan::all();

        foreach ($loans as $key => $loan) {
            $data[$key]['id'] = $loan->id;
            $data[$key]['userId'] = $loan->user_id;
            $data[$key]['userName'] = $loan->users()->first()->name;
            $data[$key]['dueDate'] = date('d-m-Y', strtotime($loan->due_date));
            $data[$key]['totalLoan'] = $loan->total_loan;
            $data[$key]['status'] = Loan::getLoanStatuses($loan);
            $data[$key]['employeeName'] = $loan->employees()->first()->name;
        }

        return $data;
    }
}
