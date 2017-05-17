<?php
header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
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
    return 'Api is running';
});
Route::resource('categories','Api\CategoryController');
Route::post('auth/register','Auth\RegisterController@postRegister');
Route::post('auth/login','Auth\LoginController@postLogin');
Route::resource('expense','Api\ExpenseController');
Route::get('expenseById/{id}','Api\ExpenseController@getExpenses');