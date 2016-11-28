<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Admin Area

Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', [
    'as' => 'admin',
    'uses' => 'AdminController@home'
    ]);

    Route::get('/admin/api', [
    'as' => 'api',
    'uses' => 'AdminController@api'
    ]);

});

// Training Plans

Route::get('/training', 'TrainingController@index');

Route::resource('training/weights-training-plan', 'WeightsTrainingPlanController');


//////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\



Route::get('/pt-zone/premium', 'PTUploadController@index');


Route::post('/profile/{account}/{user}', [
    'as' => 'unfollow',
    'uses' => 'unfollow@unfollow'

]);

Route::post('/cover_upload', [
    'as' => 'cover_upload',
    'uses' => 'Cover_UploadController@index'

]);

Route::post('/w_shared', [
    'as' => 'w_shared',
    'uses' => 'WController@store'

]);

Route::post('/settings/change', [
    'as' => 'workout_default',
    'uses' => 'SettingsController@workout_default'

]);

Route::post('/update_notifications', [
    'as' => 'update_notifications',
    'uses' => 'UpdateNotificationsController@update_notifications'

]);

Route::get('/settings', [
    'as' => 'settings',
    'uses' => 'SettingsController@index'

]);


Route::group(['middleware' => 'subscribe'], function () {
    Route::get('premium/{id}', 'PremiumController@index', function ($id)    {
    })->name('premium_index');

});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/workout_notifications', [
    'as' => 'workout_notifications',
    'uses' => 'UpdateNotificationsController@workout_notifications'

]);

});

/*Route::post('SettingsController@workout_default', function ()    {
    })->name('workout_default');*/

Route::get('/history/search/', [
    'as' => 'history_search',
    'uses' => 'history_search@search_weight'

]);

Route::get('/workout_goals', [
    'as' => 'PBController',
    'uses' => 'PBController@pb'

]);

Route::group(['middleware' => 'auth', 'premium'], function () {
Route::get('/premium_home', [
    'as' => 'premium_home',
    'uses' => 'Premium_MainController@index'

]);
});


Route::auth();
Auth::routes();
Route::get('auth/logout', 'Auth\AuthController@logout');

//Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
//Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Route::resource('subscribe', 'SubscribeController');
Route::resource('account', 'AccountsController');
Route::resource('work', 'WorkController');
Route::resource('profile', 'ProfileController');
Route::resource('update', 'UpdateController');
Route::resource('history', 'HistoryController');
Route::resource('workout_goals', 'WorkoutGoalsController');
Route::resource('WorkoutLog', 'WorkoutLogController');
Route::resource('workout_training', 'WorkoutTrainingController');
Route::resource('workoutshared', 'WorkoutSharedController');
Route::resource('settings', 'SettingsController');

Route::group(['middleware' => 'auth', 'pro'], function () {
Route::resource('pro_management', 'PtProSubscribersControllers');
Route::resource('ptvideo', 'PTUploadVideoController');
Route::resource('ptpost', 'PTUploadPostController');
Route::resource('ptimage', 'PTUploadImageController');
Route::resource('pt-zone', 'PTController');
Route::post('/pt_create_album', [
    'as' => 'pt_create_album',
    'uses' => 'Pt_create_albumController@create'
]);


});
