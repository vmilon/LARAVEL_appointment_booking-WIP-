<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    

    // Route for listing appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');

    // Route for showing the form to create a new appointment
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

    // Route for storing a new appointment
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    // Route for showing the form to edit an existing appointment
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');

    // Route for updating an existing appointment
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

    // Route for deleting an appointment
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

    // Set the root path to redirect to the appointments index page
    Route::redirect('/', '/appointments');

});



require __DIR__.'/auth.php';
