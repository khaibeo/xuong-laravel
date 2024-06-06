<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CatalogueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);

// Auth::routes();

Route::get('auth/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [LoginController::class, 'login']);
Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('ahihi', function () {
    return 'ahihi';
})->middleware('admin');


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', function () {
            return 'Đây là trang Dashboard!';
        });

        Route::prefix('catalogues')
            ->as('catalogues.')
            ->group(function () {
                Route::get('/',                 [CatalogueController::class, 'index'])->name('index');
                Route::get('create',            [CatalogueController::class, 'create'])->name('create');
                Route::post('store',            [CatalogueController::class, 'store'])->name('store');
                Route::get('show/{id}',         [CatalogueController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [CatalogueController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [CatalogueController::class, 'update'])->name('update');
                Route::get('{id}/destroy',   [CatalogueController::class, 'destroy'])->name('destroy');
            });
    });
