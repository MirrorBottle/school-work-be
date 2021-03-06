<?php

use App\Http\Controllers\Api\v1\DepositController;
use App\Http\Controllers\Api\v1\LoanController;
use App\Http\Controllers\Api\v1\PassportAuthController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\EmployeeController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [PassportAuthController::class, 'register']);
    Route::post('/login', [PassportAuthController::class, 'login']);
});

Route::prefix('loan')->group(function () {
    Route::get('/', [LoanController::class, 'listOfLoans']);
    Route::get('/{id}', [LoanController::class, 'detailsOfLoan']);
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'listOfUsers']);
    Route::get('/{id}', [UserController::class, 'detailsOfUser']);
});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'listOfEmployees']);
    Route::get('/{id}', [EmployeeController::class, 'detailsOfEmployee']);
});

Route::prefix('deposit')->group(function () {
    Route::get('/', [DepositController::class, 'listOfDeposits']);
    Route::get('/{id}', [DepositController::class, 'detailsOfDeposit']);
});

Route::prefix('payment')->group(function () {
    Route::get('/', [PaymentController::class, 'listOfPayments']);
    Route::get('/{id}', [PaymentController::class, 'detailsOfPayment']);
});
