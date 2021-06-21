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
Route::get('/logout', 'AuthController@doLogout');
Route::get('/register', 'AuthController@showRegister');
Route::post('/register', 'AuthController@doRegister');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'AdminController@showDashboard');
    Route::get('/companies', 'AdminController@showCompanies');
    Route::get('/ajax/datatables/companies', 'AdminController@ajaxDataTablesCompanies')->name('ajax.datatables');
    Route::get('/show/add/company', 'AdminController@showAddCompany');
    Route::post('/add/company', 'AdminController@addCompany');
    Route::get('/show/edit/company/{id}', 'AdminController@showEditCompany');
    Route::post('/do/edit/company', 'AdminController@doEditCompany');
    Route::get('/delete/company/{id}', 'AdminController@doDeleteCompany');

    Route::get('/news-letter', 'AdminController@showNewsLetter');
    Route::get('/ajax/datatables/news-letter', 'AdminController@ajaxDataTablesCompanies')->name('ajax.datatables');
    Route::get('/show/add/news-letter', 'AdminController@showAddCompany');
    Route::post('/add/news-letter', 'AdminController@addCompany');
    Route::get('/show/edit/news-letter/{id}', 'AdminController@showEditCompany');
    Route::post('/do/edit/news-letter', 'AdminController@doEditCompany');
    Route::get('/delete/news-letter/{id}', 'AdminController@doDeleteCompany');
});



