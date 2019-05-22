<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/links', function () {
    return view('links');
});

Route::get('/lessons', function () {
    return view('table_of_contents');
});

Route::get('/grammar', function () {
    return view('grammar_toc');
});


Route::get('/lessons/{dialogue_number}', function ($dialogue_number) {
    return view('lessons', [
        'dialogue_number' => $dialogue_number
    ]);
});

Route::get('/grammar/{grammar_topic}', function ($grammar_topic) {
    return view('grammar_lesson', [
        'grammar_topic' => $grammar_topic
    ]);
});
//end static pages
