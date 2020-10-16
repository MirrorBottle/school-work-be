<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Get all list of payments data
     *
     * @return json
     */
    public function listOfPayments()
    {
        $data = Payment::listOfPayments();

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil data angsuran', 'payments' => $data], 200);
    }

    public function detailsOfPayment($id)
    {
        $data = Payment::detailsOfPayment($id);

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil detail angsuran', 'payment' => $data], 200);
    }
}
