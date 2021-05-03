<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserWeight\UserWeightController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [UserWeightController::class, "index"]);

Route::prefix("auth")->group(function () {
    Route::prefix("login")->group(function () {
        Route::get("/", [AuthController::class, "showLogin"]);
        Route::post("/", [AuthController::class, "login"]);
    });

    Route::prefix("register")->group(function () {
        Route::get("/", [AuthController::class, "showRegister"]);
        Route::post("/", [AuthController::class, "register"]);
    });

    Route::get("logout", [AuthController::class, "logout"]);
});

Route::prefix("me/weight")->group(function () {
    Route::get("graph", [UserWeightController::class, "graph"]);

    Route::resource("/", UserWeightController::class, [
        "only" => ["index", "store", "destroy"],
    ]);
});
