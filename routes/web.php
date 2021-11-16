<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})-> name('about');

//Вывод всех контактов
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts.index');

//Добавить контакт
Route::get('/contacts/create', function () {
    return view('contacts');
})->name('contacts.create');

Route::post('/contacts', 'App\Http\Controllers\ContactController@store')->name('contacts.store');


Route::get('/contacts/{contact}', 'App\Http\Controllers\ContactController@show')->name('contacts.show');

Route::get('/contacts/{contact}/edit', 'App\Http\Controllers\ContactController@edit')->name('contacts.edit');

Route::post('/contacts/{contact}', 'App\Http\Controllers\ContactController@update')->name('contacts.update');

Route::delete('/contacts/{contact}', 'App\Http\Controllers\ContactController@destroy')->name('contacts.destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
