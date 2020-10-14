<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function loans()
    {
        return $this->belongsTo('App\Models\Loan');
    }

    public static function getPaymentStatuses($payment)
    {
        if ($payment->status === 0 && date('d-m-Y') > date('d-m-Y', strtotime($payment->due_date))) {
            $status = 'Lunas Belum Terlambat';
        } else if ($payment->status === 1 && date('d-m-Y') > date('d-m-Y', strtotime($payment->due_date))) {
            $status = 'Lunas Terlambat';
        } else if ($payment->status === 1) {
            $status = 'Lunas';
        } else if ($payment->status === 0) {
            $status = 'Belum Lunas';
        }

        return $status;
    }
}
