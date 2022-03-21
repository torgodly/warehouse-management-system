<?php

use App\Models\Product_import;
use App\Models\Product_report;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeassionController;
use App\Models\Session_report;

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

Route::get('/', 'Controller@index');











Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', 'SeassionController@index')->name('login');
    Route::post('/login', 'SeassionController@store');
});


Route::group(['middleware' => 'level'], function () {




    Route::get('/import', 'Product_import_controller@index');
    Route::post('/import', 'Product_import_controller@store');


    Route::get('/register', 'RegisterController@index');
    Route::post('/register', 'RegisterController@store');

    Route::get('/section', 'Section_controller@index');
    Route::post('/section', 'Section_controller@store');

        Route::get('/reports', 'Product_report_controller@index');
    Route::get('/reports/{in_out}', 'Product_report_controller@show');
    Route::get('/reports/name/{name}', 'Product_report_controller@showname');
    Route::get('/reports/name/{name}/type/{type}', 'Product_report_controller@shownametype');

    Route::get('/type', 'Type_controller@index');
    Route::post('/type', 'Type_controller@store');

    Route::get('/sessions', function () {
        $sessions_reports = Session_report::latest()->paginate(10);
        return view('sessions', compact('sessions_reports'));
    });

    Route::delete('/delete/inventory/{name}/{type}', 'Product_inventory_controller@destory');
});

Route::group(['middleware' => 'auth'], function () {


    Route::post('/logout', 'SeassionController@logout');

    Route::get('inventory', 'Product_inventory_controller@index');

    Route::get('/export', 'Product_export_controller@index');
    Route::post('/export', 'Product_export_controller@store');


});
