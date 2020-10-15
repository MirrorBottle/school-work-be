<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get list array of users
     *
     * @return json
     */
    public function listOfUsers()
    {
        $data = User::listOfUsers();

        return response()->json(['status' => 200, 'message' => 'Berhasil mengambil data pengguna', 'users' => $data], 200);
    }

    public function detailsOfUser($id)
    {
        $data = User::detailsOfUser($id);

        return response()->json(['status' => 200, 'message' => 'Berhasil data detail pengguna', 'user' => $data], 200);
    }
}
