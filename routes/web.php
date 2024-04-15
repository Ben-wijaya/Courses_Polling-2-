<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUsersController;
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
    Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('userAccess:Admin');
});

