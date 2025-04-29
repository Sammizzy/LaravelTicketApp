<?php
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;


// Front pages
Route::get('home', [FrontController::class, 'home'])->name('home');
Route::get('welcome', [FrontController::class, 'welcome'])->name('welcome');
Route::get('tickets', [FrontController::class, 'tickets'])->name('tickets');

Route::get('tickets/{id}', [FrontController::class, 'showTicket'])->name('tickets.show'); //tickets create links to their own page

// Form pages
Route::get('form', [FormController::class, 'showForm'])->name('form'); // Only this GET /form
Route::post('submit', [FormController::class, 'submitForm'])->name('form.submit');


// Handle form submission and submits to the tickets page, sends user to ticket page after form completion
//Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');
