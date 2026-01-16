<?php

use App\Models\Kategori;
use App\Models\Event;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\HistoriesController;
use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'categories' => Kategori::all(),
        'events' => Event::all()
    ]);
})->name('home');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Category Management
    Route::resource('categories', CategoryController::class);

    // Event Management
    Route::resource('events', EventController::class);

    // Tiket Management 
    Route::resource('tickets', TiketController::class);

    // Histories
    Route::get('/histories', [HistoriesController::class, 'index'])->name('histories.index');
    Route::get('/histories/{id}', [HistoriesController::class, 'show'])->name('histories.show');
});

require __DIR__ . '/auth.php';
