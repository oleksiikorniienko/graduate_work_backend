<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('questions', 'QuestionController@index');
Route::post('types/determine', 'TypeController@determine');
Route::get('types/{type}', 'TypeController@show')
    ->where(['type' => '[0-9]+']);
