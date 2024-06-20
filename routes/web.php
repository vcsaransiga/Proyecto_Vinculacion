<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\CategoriesWarehouseController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CategoryItemController;
use App\Http\Controllers\MeasurementUnitController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

// Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
// Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
// Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');



Route::get('/profile', [ProfileController::class, 'index'])->name('users.profile');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('users.update');




Route::resource('users', UserController::class)->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
Route::delete('/users/delete', [UserController::class, 'deleteSelectedUsers']);


Route::resource('students', StudentController::class);
Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware('auth');
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');


Route::resource('periods', PeriodController::class);
Route::get('/periods', [PeriodController::class, 'index'])->name('periods.index')->middleware('auth');

Route::resource('categories_warehouse', CategoriesWarehouseController::class)->middleware('auth');
// Route::get('/categories_warehouse', [CategoriesWarehouseController::class, 'index'])->name('categories_warehouse.index')->middleware('auth');

Route::resource('warehouses', WarehouseController::class)->middleware('auth');


Route::resource('warehouses', WarehouseController::class)->middleware('auth');

Route::resource('responsibles', ResponsibleController::class)->middleware('auth');

Route::resource('modules', ModuleController::class)->middleware('auth');

Route::resource('categories_items', CategoryItemController::class)->middleware('auth');
Route::resource('measurement_units', MeasurementUnitController::class)->middleware('auth');
