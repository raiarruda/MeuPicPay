<?php

use App\Http\Controllers;

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
Route::group([
	             'middleware' => 'auth',
	             'namespace'  => 'Admin',
	             'prefix'     => 'admin'
             ], function ()
{
	Route::get('/', 'AdminController@index')->name('admin');

	Route::get('balance', 'BalanceController@index')->name('admin.balance');

	Route::get('deposit', 'BalanceController@deposit')->name('balance.deposit');
	Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');
	

	Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
	Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');

	Route::get('transferTo', 'BalanceController@transferTo')->name('balance.transferTo');
	Route::post('transfer', 'BalanceController@transfer')->name('balance.transfer');
	Route::post('transferConfirm', 'BalanceController@transferStore')->name('transfer.store');
});


// Route::get('/', 'Site\SiteController@index');
Route::get('/', function ()
{
	return redirect()->route('admin.balance');
});

Auth::routes();

