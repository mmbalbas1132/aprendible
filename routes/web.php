<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RingController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/rings', function (){
//    return 'Bienvenido a Ring';
//})->name('rings.index');

//El middleware verified en estos momentos no realiza ninguna acción porque no está habilitado en el modelo Users (//use Illuminate\Contracts\Auth\MustVerifyEmail;)

//Metí esta ruta dentro del grupo de abajo para que herede las propiedades del middlewarte auth. Le quito la llamada al método middleware auth y como solo retorno una vista, utilizo el método view y me queda como resultado Route::view('/dashboard', 'dashboard')->name('dashboard');
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rings',  [RingController::class, 'index'])->name('rings.index');
    Route::post('/rings', [RingController::class, 'store'])->name('rings.store');

});

Route::get('/rings/{ring}/edit', [RingController::class, 'edit'])->name('rings.edit');
Route::put('/rings/{ring}', [RingController::class, 'update'])->name('rings.update');
Route::delete('/rings/{ring}', [RingController::class, 'destroy'])->name('rings.destroy');


//    rings.index es la forma de blade de escribir la ruta (rings/index) Laravel ya detecta que está en la ruta resources/views




