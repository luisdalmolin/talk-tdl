<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('questions', 'QuestionsController@create')->name('questions.create');
Route::post('questions', 'QuestionsController@store')->name('questions.store');
Route::delete('questions/{question}', 'QuestionsController@destroy')->name('questions.destroy')
    ->middleware('can:destroy,question');

Auth::routes();
