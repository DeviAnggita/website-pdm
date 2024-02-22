<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\ForgotController;

use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileUserController;


use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileAdminController;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuLevelController;
use App\Http\Controllers\MenuUserController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFotoController;
use App\Http\Controllers\UserActivityController;

use App\Http\Controllers\ErrorApplicationController;







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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
});


// Route untuk menampilkan form regist
Route::get('/regist', [RegistController::class, 'showRegistForm'])->name('regist');
// Route untuk proses regist
Route::post('/regist', [RegistController::class, 'regist'])->name('regist.submit');

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route untuk menampilkan form forgot
Route::get('/forgot', [ForgotController::class, 'showForgotForm'])->name('forgot');
Route::post('/forgot', [ForgotController::class, 'sendResetLinkEmail'])->name('password.email');
// Route untuk menampilkan form reset
Route::get('/reset-password/{token}', [ForgotController::class, 'showResetForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotController::class, 'submitResetPasswordForm'])->name('reset.password.post');



//======================================================

// Route::middleware(['auth','IsUser'])->group(function () {
    // });



Route::middleware(['auth', 'IsUser'])->group(function () {

    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard'); 

    Route::get('/user/profile', [ProfileUserController::class, 'index'])->name('user.profile');
    Route::put('/user/profile/updateFotoProfile/{id_user}', [ProfileUserController::class, 'updateFotoProfile'])->name('user.profile.updateFotoProfile');
    Route::put('/user/profile/updateKelolaPengguna/{id_user}', [ProfileUserController::class, 'updateKelolaPengguna'])->name('user.profile.updateKelolaPengguna');
    Route::put('/user/profile/updateKelolaAkun/{id_user}', [ProfileUserController::class, 'updateKelolaAkun'])->name('user.profile.updateKelolaAkun');
    Route::put('/user/profile/update/{id_user}', [ProfileUserController::class, 'update'])->name('user.profile.update');


    
});
   


    
Route::middleware(['auth','IsAdmin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('admin.profile');
    Route::put('/admin/profile/updateFotoProfile/{id_user}', [ProfileAdminController::class, 'updateFotoProfile'])->name('admin.profile.updateFotoProfile');
    Route::put('/admin/profile/updateKelolaPengguna/{id_user}', [ProfileAdminController::class, 'updateKelolaPengguna'])->name('admin.profile.updateKelolaPengguna');
    Route::put('/admin/profile/updateKelolaAkun/{id_user}', [ProfileAdminController::class, 'updateKelolaAkun'])->name('admin.profile.updateKelolaAkun');
    Route::put('/admin/profile/update/{id_user}', [ProfileAdminController::class, 'update'])->name('admin.profile.update');


    //MENU
    Route::get('/admin/menus', [MenuController::class, 'index'])->name('menus');
    Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('Menu.create');
    Route::post('/admin/menus/store', [MenuController::class, 'store'])->name('Menu.store');
    Route::put('/admin/menus/update/{menu}', [MenuController::class, 'update'])->name('Menu.update');
    Route::delete('/admin/menus/delete/{menu}', [MenuController::class, 'destroy'])->name('Menu.destroy');

    //MENU LEVEL
    Route::get('/admin/menuLevel', [MenuLevelController::class, 'index'])->name('MenuLevel');
    Route::get('/admin/menuLevel/create', [MenuLevelController::class, 'create'])->name('MenuLevel.create');
    Route::post('/admin/menuLevel/store', [MenuLevelController::class, 'store'])->name('MenuLevel.store');
    Route::put('/admin/menuLevel/update/{menuLevel}', [MenuLevelController::class, 'update'])->name('MenuLevel.update');
    Route::delete('/admin/menuLevel/delete/{menuLevel}', [MenuLevelController::class, 'destroy'])->name('MenuLevel.destroy');

    //MENU USER 
    Route::get('/admin/menuUser', [MenuUserController::class, 'index'])->name('MenuUser');
    Route::get('/admin/menuUser/create', [MenuUserController::class, 'create'])->name('MenuUser.create');
    Route::post('/admin/menuUser/store', [MenuUserController::class, 'store'])->name('MenuUser.store');
    Route::put('/admin/menuUser/update/{menuUser}', [MenuUserController::class, 'update'])->name('MenuUser.update');
    Route::delete('/admin/menuUser/delete/{menuUser}', [MenuUserController::class, 'destroy'])->name('MenuUser.destroy');


    //USER 
    Route::get('/admin/user', [UserController::class, 'index'])->name('users');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('User.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('User.store');
    Route::put('/admin/user/update/{user}', [UserController::class, 'update'])->name('User.update');
    Route::delete('/admin/user/delete/{user}', [UserController::class, 'destroy'])->name('User.destroy');
    
    //USER FOTO 
    Route::get('/admin/userFoto', [UserFotoController::class, 'index'])->name('UserFoto');
    Route::get('/admin/userFoto/create', [UserFotoController::class, 'create'])->name('UserFoto.create');
    Route::post('/admin/userFoto/store', [UserFotoController::class, 'store'])->name('UserFoto.store');
    Route::put('/admin/userFoto/update/{user}', [UserFotoController::class, 'update'])->name('UserFoto.update');
    Route::delete('/admin/Foto/delete/{user}', [UserFotoController::class, 'destroy'])->name('UserFoto.destroy');


    //USER ACTIVITY 
    Route::get('/admin/userActivity', [UserActivityController::class, 'index'])->name('UserActivity');
    Route::get('/admin/userActivity/create', [UserActivityController::class, 'create'])->name('UserActivity.create');
    Route::post('/admin/userActivity/store', [UserActivityController::class, 'store'])->name('UserActivity.store');
    Route::put('/admin/userActivity/update/{userActivity}', [UserActivityController::class, 'update'])->name('UserActivity.update');
    Route::delete('/admin/userActivity/delete/{userActivity}', [UserActivityController::class, 'destroy'])->name('UserActivity.destroy');

    
    
    // //EROR APLICATION 
    Route::get('/admin/errorApplication', [ErrorApplicationController::class, 'index'])->name('ErrorApplication');
    Route::get('/admin/errorApplication/create', [ErrorApplicationController::class, 'create'])->name('ErrorApplication.create');
    Route::post('/admin/errorApplication/store', [ErrorApplicationController::class, 'store'])->name('ErrorApplication.store');
    Route::put('/admin/errorApplication/update/{errorApplication}', [ErrorApplicationController::class, 'update'])->name('ErrorApplication.update');
    Route::delete('/admin/errorApplication/delete/{errorApplication}', [ErrorApplicationController::class, 'destroy'])->name('ErrorApplication.destroy');
    
    });