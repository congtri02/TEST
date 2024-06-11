<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'User'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', 'UserAuth@login')->name('user.login');
        Route::post('login', 'UserAuth@doLogin');
        Route::get('signup', 'UserAuth@signup')->name('user.signup');
        Route::post('signup', 'UserAuth@doSignup');
    });

    // prevent user to access these routes if not logged In
    Route::group(['middleware' => 'auth'], function () {
        Route::any('logout', 'UserAuth@logout')->name('user.logout');
        Route::get('/', 'HomeController@index');
        Route::post('result', 'HomeController@quizResult');
        Route::get('result-csv', 'HomeController@exportCsv');
        Route::get('take-quiz', 'HomeController@takeQuiz')->name('user.takeQuiz');
        Route::any('content-quiz', 'HomeController@contentQuiz')->name('user.contentQuiz');
        Route::post('quiz/submit', 'HomeController@submit')->name('quiz.submit');
        Route::post('quiz/copy', 'HomeController@copy')->name('quiz.copy');
        Route::get('exam-quiz', 'HomeController@examQuiz')->name('exam.quiz');
        Route::get('/exams/{id}-{slug}', 'HomeController@examQuiz@showExam')->name('exams.show');

    });

});


