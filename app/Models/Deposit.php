<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    public static function getDepositDataByUserId($user_id)
    {
        $deposits = Deposit::where('user_id', $user_id)->get();

        foreach ($deposits as $key => $deposit) {
            $data[$key]['id'] = $deposit->id;
            $data[$key]['depositDate'] = indonesian_date_format($deposit);
            $data[$key]['totalDeposit'] = $deposit->total_deposit;
            $data[$key]['status'] = Deposit::getDepositStatuses($deposit);
        }

        return $data;
    }

    public static function getDepositStatuses($deposit)
    {
        if ($deposit->status === 0) {
            $status = 'Belum Divalidasi';
        }

        if ($deposit->status === 1) {
            $status = 'Disetujui';
        }

        if ($deposit->status === 2) {
            $status = 'Ditolak';
        }

        return $status;
    }
}
