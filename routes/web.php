<?php

use App\Exports\CustomersExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TestPDFController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OpticianController;
use App\Http\Controllers\CustomerListController;

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


Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function() {
    // Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::resource('/campaigns', \App\Http\Controllers\CampaignController::class);
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::resource('/campaigns', \App\Http\Controllers\CampaignController::class);

    Route::controller(CustomerListController::class)->group(function () {
        Route::get('/campaings', 'index')->name('customerList.index');
    });


    Route::controller(CustomerController::class)->group(function(){

        Route::get('/customers','index')->name('customers');
        Route::post('/customers','store')->name('customers.store');
        Route::put('/customers/{id}','update')->name('customers.update');
        Route::get('/customers/{id}','destroy')->name('customers.delete');

    });

    Route::controller(CustomerListController::class)->group(function (){
        Route::get('/customerlist','index')->name('customerlist');
        Route::get('/customerlist/download','download_pdf')->name('customer_list.pdf.download');
        Route::post('customer_csv', 'importCsv')->name('customer_list.csv.import');

        Route::post('/customerlist','store')->name('customerlist.store');
        Route::put('/customerlist/{id}','update')->name('customerlist.update');
        Route::get('/customerlist/{id}','destroy')->name('customerlist.delete');
        Route::get('export_csv','export_into_csv')->name('customerlist.export');
    });

    Route::controller(OpticianController::class)->group(function () {
        Route::get('/opticians', 'index')->name('opticians');
        Route::post('/opticians','store')->name('opticians.store');
        Route::get('/optician_lock/{id}', 'lockOptician')->name('opticians.lock');
        Route::get('/optician_unlock/{id}', 'UnLockOptician')->name('opticians.unlock');
        Route::get('/opticains/{id}','view')->name('opticians.view');
        Route::put('/opticains/{id}','update')->name('opticians.update');
        Route::delete('/opticains/{id}','destroy')->name('opticians.delete');
     });

    Route::controller(EventController::class)->group(function () {
        Route::get('/settings', 'index')->name('events.index');
        Route::post('/settings_store', 'store')->name('events.store');
        Route::put('/settings_updated/{event_id}', 'update')->name('events.update');
        Route::delete('/settings_delete/{event_id}', 'destroy')->name('events.delete');
    });

     Route::controller(CampaignController::class)->group(function(){
        Route::get('/campaigns','index')->name('campaigns');
        Route::post('/campaigns','store')->name('campaigns.store');
        Route::get('/campaigns_delete/{id}','destroy')->name('campaigns.delete');
        Route::put('/campaigns_update/{id}','update')->name('campaigns.update');
        Route::get('/campaigns_edit/{id}','edit')->name('campaigns.edit');
     });
});

Route::fallback(function () {
    return redirect('/dashboard');
});

Route::get('getData',[\App\Http\Controllers\CustomerController::class, 'importCsv']);

