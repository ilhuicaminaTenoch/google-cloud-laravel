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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coneccion', function () {
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        echo "Connected successfully to: " . DB::connection()->getDatabaseName();
    }catch (\Exception $e){
        die("Could not connect to the database. Please check your configuration. error:" . $e );
    }

    return view('welcome');
});

Route::get('preview', 'PDFController@preview');
Route::get('download', 'PDFController@download')->name('download');
