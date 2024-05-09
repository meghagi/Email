<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactController1;
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

Route::get('/index', function () {
    return view('welcome');
})->name('index');
Route::get('contact-us', [ContactController1::class, 'index']);
Route::post('contact-us', [ContactController1::class, 'store'])->name('contact.us.store');
Route::get('dynamic-contact/{id}',[ContactController1::class,'dynamic_contact'])->name('dynamic-contact');
Route::post('dynamic-contact1',[ContactController1::class,'savedynamic'])->name('dynamic-contact1');
Route::get('contact-us1', [ContactController1::class, 'index1']);

Route::post('contact-us1', [ContactController1::class, 'store1'])->name('contact.us1.store1');