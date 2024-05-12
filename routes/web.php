<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AlatMusikController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Api\PaymentController;
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
    return view('welcome');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BerandaController::class, 'index']);
    Route::get('login', [AuthenticatedSessionController::class, 'create']);
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

    //User
    Route::resource('user', UserController::class)->except('update', 'change_password');
    Route::put('user-update/{id}', [UserController::class, 'update']);
    Route::post('change-password', [UserController::class, 'change_password']);

    //Role
    Route::resource('role', RoleController::class)->except('update');
    Route::put('role-update/{id}', [RoleController::class, 'update']);

    //Guru
    Route::resource('guru', GuruController::class)->except('update');
    Route::put('guru-update/{id}', [GuruController::class, 'update']);

    //Alat Musik
    Route::resource('alat-musik', AlatMusikController::class)->except('update');
    Route::put('alat-musik-update/{id}', [AlatMusikController::class, 'update']);

    //Studio
    Route::resource('studio', StudioController::class)->except('update');
    Route::put('studio-update/{id}', [StudioController::class, 'update']);

    //Resepsionis
    Route::resource('resepsionis', ResepsionisController::class)->except('update');
    Route::put('resepsionis-update/{id}', [ResepsionisController::class, 'update']);

    //Level
    Route::resource('level', LevelController::class)->except('update');
    Route::put('level-update/{id}', [LevelController::class, 'update']);

    //Course
    Route::resource('course', CourseController::class)->except('update');
    Route::put('course-update/{id}', [CourseController::class, 'update']);

    //Reservasi
    Route::resource('reservasi', ReservasiController::class)->except('update', 'approve', 'reject');
    Route::put('reservasi-update/{id}', [ReservasiController::class, 'update']);
    Route::put('reservasi-approve/{id}', [ReservasiController::class, 'approve']);
    Route::put('reservasi-reject/{id}', [ReservasiController::class, 'reject']);

    //Payment
    Route::resource('payment', PaymentController::class);

    //Profile
    Route::resource('profile', ProfileController::class);
    // Route::put('profile-update/{id}', [ProfileController::class, 'update']);
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('', UserController::class);
});

require __DIR__.'/auth.php';
