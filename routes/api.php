<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
// ------------------------Clients------------------------------  //

Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/{id}', [ClientController::class, 'show']);

Route::put('/client/{id}', [ClientController::class, 'update']);
Route::delete('/client/{id}', [ClientController::class, 'destroy']);

// ------------------------Products------------------------------  //

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::post('/products', [ProductController::class, 'store']);
Route::patch('/products/{id}', [ProductController::class, 'update']);

// ------------------------Statistics------------------------------  //

Route::get('/statistics', [StatisticsController::class, 'index']);

// ------------------------Logout------------------------------  //

Route::post('logout', [AuthController::class, 'logout']);
});


// ------------------------Auth------------------------------  //

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ---------------------------------------------------------- //
// Route::get('/test', function(){
//     $cars=[
//         ["name" => 'BMW', "Price" => 100000, "tax" => 0.05, "Prop" => ["accs" => "AI", "Price" => 1000]],
//         ["name" => 'MRC', "Price" => 500000, "tax" => 0.010, "Prop" => ["accs" => "AI", "Price" => 5000]],
//         ["name" => 'MRC', "Price" => 300000, "tax" => 0.08, "Prop" => ["accs" => "AI", "Price" => 7000]],
//         ["name" => 'MRC', "Price" => 200000, "tax" => 0.06, "Prop" => ["accs" => "AI", "Price" => 2000]],
//         ["name" => 'MRC', "Price" => 900000, "tax" => 0.02, "Prop" => ["accs" => "AI", "Price" => 3000]],
//         ["name" => 'MRC', "Price" => 400000, "tax" => 0.05, "Prop" => ["accs" => "AI", "Price" => 6000]],
//         ["name" => 'MRC', "Price" => 800000, "tax" => 0.01, "Prop" => ["accs" => "AI", "Price" => 4000]],
//         ["name" => 'MRC', "Price" => 700000, "tax" => 0.015, "Prop" => ["accs" => "AI", "Price" => 9000]],
//     ];
//     foreach ($cars as $car){
//         echo $car["Price"] + $car["Prop"]["Price"] * $car["tax"] . "\n";
//     }
// });
