<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Get all data from deposits
     *
     * @return json
     */
    public function listOfDeposits()
    {
        $data = Deposit::listOfDeposits();

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil data setoran', 'deposits' => $data], 200);
    }

    public function detailsOfDeposit($id)
    {
        $data = Deposit::detailsOfDeposit($id);

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil detail setoran', 'deposit' => $data], 200);
    }
}
