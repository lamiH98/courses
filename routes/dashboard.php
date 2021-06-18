<?php

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::group(['prefix' => 'dashboard' , 'namespace' => 'dashboard' , 'middleware' => 'auth:admin'], function () {
    // Route Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    // Route Admin
    Route::resource('admin', 'AdminController');
    Route::get('admin/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');
    Route::post('admin/MultiDestroy', 'AdminController@Multidestroy')->name('admin.Multidestroy');

    // Route For Admin Profile
    Route::get('my-profile', 'AdminProfileController@index')->name('admin.profile');
    Route::put('my-profile', 'AdminProfileController@update')->name('admin.profileUpdate');

    // Route User
    Route::resource('user', 'UserController');
    Route::get('user-courses/{id}', 'UserController@showUserCourses')->name('user.courses');
    Route::get('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::post('user/MultiDestroy', 'UserController@Multidestroy')->name('user.Multidestroy');

    // Route Categories
    Route::resource('stage', 'StageController');
    Route::get('stage/courses/{id}', 'StageController@showCourses')->name('stage.courses');
    Route::get('stage/destroy/{id}', 'StageController@destroy')->name('stage.destroy');
    Route::post('stage/MultiDestroy', 'StageController@Multidestroy')->name('stage.Multidestroy');

    // Route Slider
    Route::resource('slider', 'SliderController');
    Route::get('slider/destroy/{id}', 'SliderController@destroy')->name('slider.destroy');
    Route::post('slider/MultiDestroy', 'SliderController@Multidestroy')->name('slider.Multidestroy');

    // Route Course
    Route::resource('course', 'CourseController');
    Route::get('course/users/{id}', 'CourseController@showUsers')->name('course.users');
    Route::get('course/videos/{id}', 'CourseController@showVideos')->name('course.videos');
    Route::get('course/quizzes/{id}', 'CourseController@showQuizzes')->name('course.quizzes');
    Route::get('course/destroy/{id}', 'CourseController@destroy')->name('course.destroy');
    Route::post('course/MultiDestroy', 'CourseController@Multidestroy')->name('course.Multidestroy');

    // Route Videos
    Route::resource('video', 'VideoController');
    Route::get('course-videos/{id}', 'VideoController@createCourseVideo')->name('video.createCourseVideo');
    Route::get('video/destroy/{id}', 'VideoController@destroy')->name('video.destroy');
    Route::post('video/MultiDestroy', 'VideoController@Multidestroy')->name('video.Multidestroy');

    // Route Quiz
    Route::resource('quiz', 'QuizController');
    Route::get('quiz-question/{id}', 'QuizController@showQuizQuestions')->name('quiz.question');
    Route::get('quiz/destroy/{id}', 'QuizController@destroy')->name('quiz.destroy');
    Route::post('quiz/MultiDestroy', 'QuizController@Multidestroy')->name('quiz.Multidestroy');

    // Route Question
    Route::resource('question', 'QuestionController');
    Route::get('question/destroy/{id}', 'QuestionController@destroy')->name('question.destroy');
    Route::post('question/MultiDestroy', 'QuestionController@Multidestroy')->name('question.Multidestroy');

    // Route Setting
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::put('setting/update', 'SettingController@update')->name('setting.update');

    // notifications
    Route::get('/push-notificaiton', 'NotificationController@index')->name('notification.index');
    Route::post('save-token','NotificationController@saveToken')->name('save-token');
    Route::post('send-notification','NotificationController@sendNotification')->name('send-notification');

});

Route::get('local/{lang?}', ['as' => 'local.change', 'uses' => 'Dashboard\LocalizationController@change']);
