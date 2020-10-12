<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassportAuthController extends Controller
{
    /**
     * API Register
     *
     * @param  mixed $request
     * @return json
     */
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('token')->accessToken;

        return response()->json(['status' => 200, 'message' => 'Register berhasil!', 'token' => $token], 200);
    }

    /**
     * API Login
     *
     * @param  mixed $request
     * @return json
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!auth()->attempt($data)) {
            return response()->json(['status' => 401, 'message' => 'Unauthorised'], 401);
        }

        $token = auth()->user()->createToken('token')->accessToken;

        return response()->json(['status' => 200, 'message' => 'Login berhasil!', 'token' => $token], 200);
    }
}
