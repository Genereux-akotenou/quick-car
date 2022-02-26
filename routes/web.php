<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Authentification web routes ->(withoutConnexion)
|--------------------------------------------------------------------------
*/
Route::get('/connexion',        [AuthController::class, 'login_view'])->name('auth.login');
Route::get('/inscription',      [AuthController::class, 'register_view'])->name('auth.register');
Route::post('/connexion',       [AuthController::class, 'authenticate'])->name('gauth.login');
Route::post('/inscription',     [AuthController::class, 'register'])->name('gauth.register');
Route::get('/logout',           [AuthController::class, 'logout'])->name('auth.logout');


/*
|--------------------------------------------------------------------------
| General web routes        ->(withoutConnexion)
|--------------------------------------------------------------------------
*/
Route::get('/',                 [ViewController::class, 'index'])->name('shared.index');
Route::get('/contact',          [ViewController::class, 'contact'])->name('shared.contact');
Route::get('/nos-voitures',     [ViewController::class, 'voiture'])->name('shared.voiture');

/*
|--------------------------------------------------------------------------
| SimpleUser web routes     ->(connected)
|--------------------------------------------------------------------------
*/
Route::middleware(['Auth'])->group(function () {
    Route::get('/mes-locations',         [ViewController::class, 'location'])->name('user.location');
    Route::get('/voiture-details/{id}',  [ViewController::class, 'voitureDetails'])->name('user.details');
    Route::post('/voiture-dispo/{id}',   [ViewController::class, 'checkAvailable'])->name('user.check');
    Route::get('/valider-location/{id}', [ViewController::class, 'validerLocation'])->name('car.validation');
    Route::get('/valider/{id}',          [ViewController::class, 'finale'])->name('car.finale');
    Route::get('/rendre/{id}/{d1}/{d2}', [ViewController::class, 'rendre'])->name('car.rendre');
});

/*
|--------------------------------------------------------------------------
| Admin web routes          ->(connected)
|--------------------------------------------------------------------------
*/
Route::middleware(['Admin'])->group(function () {
    Route::get('/voiture-index',        [AdminController::class, 'index'])->name('admin.index');
    Route::get('/emprunteur-liste',     [AdminController::class, 'liste'])->name('admin.liste');
    Route::get('/voiture-create',       [AdminController::class, 'create_view'])->name('admin.create');
    Route::post('/voiture-create',      [AdminController::class, 'create_back'])->name('car.create');
    Route::get('/voiture-share/{car}',  [AdminController::class, 'share'])->name('car.share');
    Route::get('/voiture-unshare/{car}',[AdminController::class, 'unshare'])->name('car.unshare');
    Route::get('/voiture-delete/{car}', [AdminController::class, 'delete'])->name('car.delete');
    Route::get('/voiture-edit/{car}',   [AdminController::class, 'edit_view'])->name('admin.edit');
    Route::post('/voiture-edit',        [AdminController::class, 'edit_back'])->name('car.edit');
});
