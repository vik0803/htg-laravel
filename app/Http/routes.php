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

Route::get('auth/login', [
        'as' => 'auth_login',
        'uses' => 'Auth\AuthController@getLogin'
    ]
);

Route::post('auth/login', [
        'as' => 'auth_login',
        'uses' => 'Auth\AuthController@postLogin'
        ]
);

Route::get('auth/logout', [
    'as' => 'auth_logout',
    'uses' => 'Auth\AuthController@getLogout'
    ]
);

// Registration routes...
Route::get('auth/register', [
    'as' => 'auth_register',
    'uses' =>'Auth\AuthController@getRegister'
    ]
);

Route::post('auth/register', [
        'as' => 'auth_register',
        'uses' => 'Auth\AuthController@postRegister'
    ]
);

Route::get('/dashboard', [
    'as' => 'dashboard_home',
    'middleware' => 'auth',
    'uses' => 'DashboardController@home'
    ]
);

// Password reset link request routes...
Route::get('password/email', [
    'as' => 'password_email',
    'uses' => 'Auth\PasswordController@getEmail'
    ]
);

Route::post('password/email', [
    'as' => 'password_email',
    'uses' => 'Auth\PasswordController@postEmail'
]);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', [
    'as' => 'password_reset',
    'use' => 'Auth\PasswordController@postReset'
]);

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index');

/*
 * Social logins
 */
Route::get('auth/login/{provider}', 'Auth\AuthController@loginWithProvider');
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');



/*
 * Admin paths
 */

Route::get('admin', [
    'middleware' => ['auth', 'roles'],
    'as' => 'admin_home',
    'uses' => 'AdminController@index',
    'roles' => ['administrator', 'root']
]);


Route::auth();

