<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\FragranceController;
use App\Http\Controllers\Admin\BrandMasterController;
use App\Http\Controllers\Admin\ComponentMasterController;

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
    return view('entry');
});

Route::middleware('auth')->group(function(){
    Route::get('admin', [TopController::class, 'index'])->name('admin.top');
});

/*Route::resource('/admin/fragrances', FragranceController::class)->only([
    'index', 'create', 'store', /*'edit', 'update', 'destroy'*//*   
])

Route::resource('/admin/brands', BrandMasterController::class)->only([
    'index', 'create', 'store', /*'edit', 'update', 'destroy'*//*   
]);

Route::resource('/admin/components', ComponentMasterController::class)->only([
    'index', 'create', 'store', /*'edit', 'update', 'destroy'*//*   
]);*/


Route::prefix('admin')->group(function () {
    
    // Route::post('brands', [BrandMasterController::class, 'store'])->name('brands.store');
    // Route::get('brands', [BrandMasterController::class, 'index'])->name('brands.index');
    // Route::get('brands/create', [BrandMasterController::class, 'create'])->name('brands.create');
    
    Route::resource('fragrances', FragranceController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('brands', BrandMasterController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('components', ComponentMasterController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

