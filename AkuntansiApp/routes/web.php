<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login',[AuthController::class,'loginPage']);
Route::post('/do_login',[AuthController::class,'doLogin']);
Route::get('/register',[AuthController::class,'registerPage']);
Route::post('/do_register',[AuthController::class,'doRegister']);
Route::middleware(['checkLogin'])->group(function () {
    Route::get('/', [HomeController::class,'dashboardPage']);
    Route::get('dashboard',[HomeController::class,'dashboardPage']);
    Route::get('transactions',[HomeController::class,'transactionPage']);
    Route::get('journal',[HomeController::class,'journalPage']);
    Route::get('general_ledger',[HomeController::class,'generalLedgerPage']);
    Route::get('trial_balance',[HomeController::class,'trialBalancePage']);
    Route::get('balance',[HomeController::class,'balancePage']);
    Route::get('finance_statement',[HomeController::class,'financialStatementPage']);
    Route::get('logout',[AuthController::class,'logout']);

    Route::post('set_equity',[HomeController::class,'updateEquity']);
    Route::post('add_asset',[HomeController::class,'addAsset']);
    Route::post('add_transaction',[HomeController::class,'addTransaction']);
    Route::get('clear_transaction',[HomeController::class,'clearTransaction']);
});