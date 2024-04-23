<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminFakultasController;
use App\Http\Controllers\AdminProdisController;
use App\Http\Controllers\MhsPollingController;
use App\Http\Controllers\ProdiHasilController;
use App\Http\Controllers\ProdiMataKuliahController;
use App\Http\Controllers\ProdiPollingController;
use App\Http\Controllers\SessionController;
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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->middleware('userAccess:Admin');
    Route::get('/dashboard/program_studi', [DashboardController::class, 'program_studi'])->middleware('userAccess:Program Studi');
    Route::get('/dashboard/mahasiswa', [DashboardController::class, 'mahasiswa'])->middleware('userAccess:Mahasiswa');
    Route::get('/logout', [SessionController::class, 'logout']);
    Route::resource('/dashboard/users', AdminUsersController::class)->middleware('userAccess:Admin');
    Route::resource('/dashboard/fakultas', AdminFakultasController::class)->middleware('userAccess:Admin');
    Route::resource('/dashboard/prodi', AdminProdisController::class)->middleware('userAccess:Admin');
    Route::resource('/dashboard/prodi_hasil', ProdiHasilController::class)->middleware('userAccess:Program Studi');
    Route::resource('/dashboard/matkul', ProdiMataKuliahController::class)->middleware('userAccess:Program Studi');
    Route::resource('/dashboard/prodi_mahasiswa', ProdiMahasiswaController::class)->middleware('userAccess:Program Studi');
    Route::resource('/dashboard/prodi_polling', ProdiPollingController::class)->middleware('userAccess:Program Studi');
    Route::resource('/dashboard/mhs_polling', MhsPollingController::class)->middleware('userAccess:Mahasiswa');
    Route::get('/dashboard/mhs_polling/{poll}/create', [MhsPollingController::class, 'create'])->name('poll.create');
    Route::get('/dashboard/prodi_polling/{id}/show', [ProdiPollingController::class, 'show'])->name('polling.show');
    Route::get('/dashboard/prodi_polling/{polling_id}/{id}/detail', [ProdiPollingController::class, 'detail'])->name('polling.detail');
});
