<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RoomController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers')->middleware(['auth', 'verified']);

Route::get('/customers/create', function () {
    return view('customers.create');
})->middleware(['auth', 'verified'])->name('customers.create');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store')->middleware(['auth', 'verified']);
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.edit')->middleware(['auth', 'verified']);
Route::delete('/customers/{id}', [CustomerController::class, 'detroy'])->name('customers.destroy')->middleware(['auth', 'verified']);

Route::get('/events', [EventController::class, 'index'])->name('events')->middleware(['auth', 'verified']);
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware(['auth', 'verified']);
Route::post('/events', [EventController::class, 'store'])->name('events.store')->middleware(['auth', 'verified']);
Route::get('/events/{eventId}/rooms', [EventController::class, 'getRooms'])->middleware(['auth', 'verified']);

Route::get('/equipments', [EquipmentController::class, 'index'])->name('equipments')->middleware(['auth', 'verified']);
Route::get('/equipments/create', [EquipmentController::class, 'create'])->name('equipments.create')->middleware(['auth', 'verified']);
Route::put('/equipments/update/{id}', [EquipmentController::class, 'update'])->name('equipments.update')->middleware(['auth', 'verified']);
Route::post('/equipments', [EquipmentController::class, 'store'])->name('equipments.store')->middleware(['auth', 'verified']);

Route::get('/rooms/{eventId}', [RoomController::class, 'index'])->name('rooms')->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
