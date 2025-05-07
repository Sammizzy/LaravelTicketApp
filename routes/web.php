<?php
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;


// Front pages
Route::get('home', [FrontController::class, 'home'])->name('home');
Route::get('welcome', [FrontController::class, 'welcome'])->name('welcome');
Route::get('tickets', [FrontController::class, 'tickets'])->name('tickets');
Route::get('login', [FrontController::class, 'login'])->name('login');

Route::get('tickets/deleted', [FrontController::class, 'deletedTickets'])->name('tickets.deleted');
Route::post('tickets/{id}/restore', [FrontController::class, 'restoreTicket'])->name('tickets.restore');
Route::get('tickets/{id}', [FrontController::class, 'showTicket'])->name('tickets.show'); //tickets create links to their own page
Route::delete('tickets/{id}', [FrontController::class, 'destroyTicket'])->name('tickets.destroy');

Route::post('tickets/{id}/approve', [FrontController::class, 'approveTicket'])->name('tickets.approve');
Route::post('tickets/{id}/deny', [FrontController::class, 'denyTicket'])->name('tickets.deny');

//Route::resource('tickets', FrontController::class );

// Form pages
Route::get('form', [FormController::class, 'showForm'])->name('form'); // Only this GET /form
Route::post('submit', [FormController::class, 'submitForm'])->name('form.submit');


// Handle form submission and submits to the tickets page, sends user to ticket page after form completion
//Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');



Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
