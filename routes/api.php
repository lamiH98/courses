<?php

use Illuminate\Http\Request;

// 'checkPassword'
Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function() {

    // Stages
    Route::get('stages', 'ApiController@stages');

    // Sliders
    Route::get('sliders', 'ApiController@sliders');

    // Courses
    Route::get('courses', 'ApiController@courses');
    Route::get('user-courses/{id}', 'ApiController@userCourses');
    Route::get('stage-courses/{id}', 'ApiController@stageCourses');
    Route::get('course-quizzes/{id}', 'ApiController@courseQuizzes');
    Route::get('course-videoes/{id}', 'ApiController@courseVideoes');
    Route::post('add-course-user/{id}', 'ApiController@addCourseUser');

    // Quizzes
    Route::get('quizzes', 'ApiController@quizzes');
    Route::get('quiz-questions/{id}', 'ApiController@quizQuestions');

    // Questions
    Route::get('questions', 'ApiController@questions');

    // Videoes
    Route::get('videoes', 'ApiController@videoes');

    // Reviews
    Route::resource('review', 'ReviewController');
    Route::get('getAvg/{id}', 'ReviewController@getAvg');

    // Notifications
    Route::post('save-token','NotificationController@saveToken');
    Route::post('send-notification','NotificationController@sendNotification');

    // Setting
    Route::get('setting', 'ApiController@setting');

    // Users
    Route::group(['prefix' => 'user','namespace'=>'User'],function (){
        Route::resource('users', 'AuthController');
        Route::post('login','AuthController@Login');
        Route::post('register','AuthController@register');
        Route::post('getUser', 'AuthController@getUser')->middleware('auth.guard:api');
        Route::post('logout','AuthController@logout');
    });


    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'], function (){
        Route::post('profile', function(){
            $user = \Auth::user();
            return response()->json($user , 200);
        });
    });

});
