<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})-> name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', 'App\Http\Controllers\ContactController@submit')->name('contact-form');

Route::get('/contact/all', 'App\Http\Controllers\ContactController@allData')->name('contact-data');

Route::get('/contact/all/{id}', 'App\Http\Controllers\ContactController@showOneMessage')->name('contact-data-one');

Route::get('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessage')->name('contact-update');

Route::post('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessageSubmit')->name('contact-update-submit');

Route::get('/contact/all/{id}/delete', 'App\Http\Controllers\ContactController@deleteMessage')->name('contact-delete');


 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
