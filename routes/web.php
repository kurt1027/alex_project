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


Route::get('/', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@doLogin');
Route::get('/register', 'AuthController@showRegister');
Route::post('/register', 'AuthController@doRegister');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'AdminController@showDashboard');
    Route::get('/companies', 'AdminController@showCompanies');
    Route::get('/ajax/datatables/companies', 'AdminController@ajaxDataTablesCompanies')->name('ajax.datatables');
    Route::get('/show/add/company', 'AdminController@showAddCompany');
    Route::post('/add/company', 'AdminController@addCompany');
});

