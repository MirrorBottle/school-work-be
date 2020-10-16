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
        if ($payment->status === 0 && date('d-m-Y') > indonesian_date_format($payment->due_date)) {
            $status = 'Lunas Belum Terlambat';
        }

        if ($payment->status === 1 && date('d-m-Y') > indonesian_date_format($payment->due_date)) {
            $status = 'Lunas Terlambat';
        }

        if ($payment->status === 1) {
            $status = 'Lunas';
        }

        if ($payment->status === 0) {
            $status = 'Belum Lunas';
        }

        return $status;
    }
}
