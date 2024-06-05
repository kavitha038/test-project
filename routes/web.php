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
    return redirect()->route('login');
});

Route::redirect('/dashboard', '/sales');


Route::middleware(['auth'])->group(function () {

// Route::get('/sales', function () {
//     return view('coffee_sales');
// })->name('coffee.sales');

Route::get('/sales', [App\Http\Controllers\SalesController::class, 'getSales'])->name('coffee.sales');
Route::post('/sales', [App\Http\Controllers\SalesController::class, 'store'])->name('coffee.store.sales');

Route::get('/sales-with-product', [App\Http\Controllers\SalesController::class, 'indexWithProduct'])->name('coffee.product.sales');
Route::post('/sales-with-product', [App\Http\Controllers\SalesController::class, 'storeWithProduct'])->name('coffee.product.store.sales');
Route::get('/sales-data', [App\Http\Controllers\SalesController::class, 'getSales'])->name('coffee.sales.data');
Route::get('/sales-data-with-product', [App\Http\Controllers\SalesController::class, 'getSalesWithProduct'])->name('coffee.product.sales-data');

});


Route::get('/shipping-partners', function () {
    return view('shipping_partners');
})->middleware(['auth'])->name('shipping.partners');

require __DIR__.'/auth.php';
