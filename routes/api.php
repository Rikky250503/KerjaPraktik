<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UseradminController;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\StatusController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kategori', [KategoriController::class,'index']);
Route::get('status', [StatusController::class,'index']);
Route::get('barang', [BarangController::class,'index']);
Route::get('supplier', [SupplierController::class,'index']);
Route::post('useradmin', [UseradminController::class,'store']);
// Route::get('customer', [CustomerController::class,'index']);


Route::delete('Barang/{id_barang}',[BarangController::class,'destroy']);