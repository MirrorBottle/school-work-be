<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function listOfDeposits()
    {
        $data = Deposit::listOfDeposits();

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil data setoran', 'deposits' => $data], 200);
    }
}
