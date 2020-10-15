<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    public function listOfEmployees()
    {
        $data = User::listOfEmployees();

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil data pegawai', 'users' => $data], 200);
    }
}
