<?php

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
Route::middleware(['verifyEmail'])->group(function () {
    // Routes that require email verification
});
Route::get('/user_form', function () {
    return view('user_form');
})->name('user_form');
Route::post('/process_user_form', function (Request $request) {
    // Process form data here
    return 'Form submitted successfully!';
})->name('process_user_form');
use App\Http\Controllers\EmailVerificationController;

Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verifyEmail'])->name('verify.email');
