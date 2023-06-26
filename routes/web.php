<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route::get('/presensiPDF', function () {

//     $pdf = PDF::loadview('presensi.presensiPDF');
//     return $pdf->download('invoice.pdf');
//     // return view('presensi.presensiPDF');
// });


Auth::routes();
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::resource('/siswa', SiswaController::class)->middleware('role:siswa,admin');
    Route::resource('/mapel', MapelController::class)->middleware('role:admin,guru');
    Route::resource('/kelas', KelasController::class)->middleware('role:admin');
    Route::resource('/guru', GuruController::class)->middleware('role:admin,guru');
    Route::resource('/jadwal', JadwalController::class)->middleware('role:admin,guru');
    Route::resource('/presensi', PresensiController::class)->middleware('role:admin,siswa,guru');
    Route::get('/presensiExportPDF', [PresensiController::class, 'exportPDF'])->name('exportPDF'); 
});
