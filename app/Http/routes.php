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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

////////////////////////////////////////////////////////////////////////////////////////////////////

////Routes for the Products Controller and Products Section of the application////////////////////
Route::get('products','ProductsController@index');

//find products by category

Route::get('findCat', 'CategoriesController@findCategoryByName');
Route::get('createCatByName','CategoriesController@createProductCategory');


Route::get('productbycategory','CategoriesController@searchProductByCategory');
Route::get('products/search','ProductsController@search');
Route::get('products/doSearch','ProductsController@doSearch');
Route::post('productbycategoryResult','CategoriesController@viewProductByCategory');
Route::get('createcategory','CategoriesController@createcategory');

Route::get('categories', 'CategoriesController@index');
Route::get('categories/search','CategoriesController@search');
Route::get('categories/doSearch', 'CategoriesController@doSearch');
Route::get('categories/createcategory','CategoriesController@createcategory');
Route::post('categories/save','CategoriesController@save');


///Routes for SalesController and Sales Section of the Application////////////////////////////
Route::get('sales', 'SalesController@index');

///////////////Stock Routes/////////////////
Route::get('stocks', 'StocksController@index');
Route::get('stocks/{stock}', 'StocksController@details');
Route::get('getstocks', 'StocksController@displaystock');
///////////////////////////////////////////////////////////////////////////////////////////////////


// Authorization
Route::get('/login', ['as' => 'auth.login.form', 'uses' => 'Auth\SessionController@getLogin']);
Route::post('/login', ['as' => 'auth.login.attempt', 'uses' => 'Auth\SessionController@postLogin']);
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\SessionController@getLogout']);

// Registration
Route::get('register', ['as' => 'auth.register.form', 'uses' => 'Auth\RegistrationController@getRegister']);
Route::post('register', ['as' => 'auth.register.attempt', 'uses' => 'Auth\RegistrationController@postRegister']);

// Activation
Route::get('activate/{code}', ['as' => 'auth.activation.attempt', 'uses' => 'Auth\RegistrationController@getActivate']);
Route::get('resend', ['as' => 'auth.activation.request', 'uses' => 'Auth\RegistrationController@getResend']);
Route::post('resend', ['as' => 'auth.activation.resend', 'uses' => 'Auth\RegistrationController@postResend']);

// Password Reset
Route::get('password/reset/{code}', ['as' => 'auth.password.reset.form', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset/{code}', ['as' => 'auth.password.reset.attempt', 'uses' => 'Auth\PasswordController@postReset']);
Route::get('password/reset', ['as' => 'auth.password.request.form', 'uses' => 'Auth\PasswordController@getRequest']);
Route::post('password/reset', ['as' => 'auth.password.request.attempt', 'uses' => 'Auth\PasswordController@postRequest']);

// Users
Route::resource('users', 'UserController');

// Roles
Route::resource('roles', 'RoleController');

// Dashboard
//Route::get('dashboard', ['as' => 'dashboard', 'uses' => function() {
Route::get('/', ['as' => 'dashboard', 'uses' => function() {
    return view('centaur.dashboard');
}]);
