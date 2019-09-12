<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');













// Route::get('/products/create', function () {
//     return view('products.create');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

