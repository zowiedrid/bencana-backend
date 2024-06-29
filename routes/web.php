<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoskoController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KebutuhanController;
use App\Http\Controllers\DistribusiController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::patch('/todo/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::patch('/todo/{todo}/incomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
    Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deleteallcompleted');

    Route::resource('/category', CategoryController::class);

    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::patch('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    Route::get('/bencana', [BencanaController::class, 'index'])->name('bencana.index');
    Route::get('/bencana/create', [BencanaController::class, 'create'])->name('bencana.create');
    Route::post('/bencana', [BencanaController::class, 'store'])->name('bencana.store');
    Route::get('/bencana/{id}', [BencanaController::class, 'show'])->name('bencana.show');
    Route::get('/bencana/{id}/edit', [BencanaController::class, 'edit'])->name('bencana.edit');
    Route::patch('/bencana/{id}', [BencanaController::class, 'update'])->name('bencana.update');
    Route::delete('/bencana/{id}', [BencanaController::class, 'destroy'])->name('bencana.destroy');

    // Daerah routes
    Route::get('/daerah', [DaerahController::class, 'index'])->name('daerah.index');
    Route::get('/daerah/create', [DaerahController::class, 'create'])->name('daerah.create');
    Route::post('/daerah', [DaerahController::class, 'store'])->name('daerah.store');
    Route::get('/daerah/{id}', [DaerahController::class, 'show'])->name('daerah.show');
    Route::get('/daerah/{id}/edit', [DaerahController::class, 'edit'])->name('daerah.edit');
    Route::patch('/daerah/{id}', [DaerahController::class, 'update'])->name('daerah.update');
    Route::delete('/daerah/{id}', [DaerahController::class, 'destroy'])->name('daerah.destroy');

    // Distribusi routes
    Route::get('/distribusi', [DistribusiController::class, 'index'])->name('distribusi.index');
    Route::get('/distribusi/create', [DistribusiController::class, 'create'])->name('distribusi.create');
    Route::post('/distribusi', [DistribusiController::class, 'store'])->name('distribusi.store');
    Route::get('/distribusi/{id}', [DistribusiController::class, 'show'])->name('distribusi.show');
    Route::get('/distribusi/{id}/edit', [DistribusiController::class, 'edit'])->name('distribusi.edit');
    Route::patch('/distribusi/{id}', [DistribusiController::class, 'update'])->name('distribusi.update');
    Route::delete('/distribusi/{id}', [DistribusiController::class, 'destroy'])->name('distribusi.destroy');

    // Kebutuhan routes
    Route::get('/kebutuhan', [KebutuhanController::class, 'index'])->name('kebutuhan.index');
    Route::get('/kebutuhan/create', [KebutuhanController::class, 'create'])->name('kebutuhan.create');
    Route::post('/kebutuhan', [KebutuhanController::class, 'store'])->name('kebutuhan.store');
    Route::get('/kebutuhan/{id}', [KebutuhanController::class, 'show'])->name('kebutuhan.show');
    Route::get('/kebutuhan/{id}/edit', [KebutuhanController::class, 'edit'])->name('kebutuhan.edit');
    Route::patch('/kebutuhan/{id}', [KebutuhanController::class, 'update'])->name('kebutuhan.update');
    Route::delete('/kebutuhan/{id}', [KebutuhanController::class, 'destroy'])->name('kebutuhan.destroy');

    // Posko routes
    Route::get('/posko', [PoskoController::class, 'index'])->name('posko.index');
    Route::get('/posko/create', [PoskoController::class, 'create'])->name('posko.create');
    Route::post('/posko', [PoskoController::class, 'store'])->name('posko.store');
    Route::get('/posko/{id}', [PoskoController::class, 'show'])->name('posko.show');
    Route::get('/posko/{id}/edit', [PoskoController::class, 'edit'])->name('posko.edit');
    Route::patch('/posko/{id}', [PoskoController::class, 'update'])->name('posko.update');
    Route::delete('/posko/{id}', [PoskoController::class, 'destroy'])->name('posko.destroy');



    Route::middleware('admin')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
        Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
    });
});

require __DIR__ . '/auth.php';
