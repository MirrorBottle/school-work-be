<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id');
    }

    public function loans()
    {
        return $this->belongsTo('App\Models\Loan');
    }

    /**
     * Wrapping the all payments data
     *
     * @return array
     */
    public static function listOfPayments()
    {
        $payments = Payment::all();

        foreach ($payments as $key => $payment) {
            $data[$key]['id'] = $payment->id;
            $data[$key]['loanId'] = $payment->loan_id;
            $data[$key]['userName'] = $payment->users()->first()->name;
            $data[$key]['userPhoneNumber'] = $payment->users()->first()->phone_number;
            $data[$key]['dueDate'] = indonesian_date_format($payment->due_date);
            $data[$key]['paymentNumber'] = $payment->payment_number;
            $data[$key]['paymentDate'] = indonesian_date_format($payment->payment_date);
            $data[$key]['status'] = Payment::getPaymentStatuses($payment);
        }

        return $data;
    }

    /**
     * Get payment statuses
     *
     * @param  mixed $payment
     * @return string
     */
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
