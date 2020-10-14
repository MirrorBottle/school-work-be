<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function listOfLoans()
    {
        $data = Loan::listOfLoans();

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil data pinjaman', 'loans' => $data], 200);
    }
}
