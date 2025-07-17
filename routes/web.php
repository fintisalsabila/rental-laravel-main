<?php

use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\UserController;
use App\Models\Pelanggan;
// use App\Models\Kendaraan;
use App\Models\RekamMedis;
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

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin', function () {
    $total_pelanggan = Pelanggan::count();
    $total_rekam_medis = RekamMedis::count();
    $total_servis_selesai = RekamMedis::where('status_servis', 'Selesai')->count();

    return view('pages.dashboard', compact(
        'total_pelanggan',
        'total_rekam_medis',
        'total_servis_selesai',
    ));
})->middleware('auth')->name('dashboard');

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('pelanggan', PelangganController::class)->middleware('auth');

// Route::get('rekammedis', [RekamMedisController::class, 'index'])->name('rekammedis.index')->middleware('auth');
Route::resource('rekammedis', RekamMedisController::class)->middleware('auth');

require __DIR__ . '/auth.php';
