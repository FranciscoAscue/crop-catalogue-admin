<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\EmailVerificacion;
use App\Http\Controllers\Auth\PasswordRecovery;
use App\Http\Controllers\CloneController;
use App\Http\Controllers\RecomendacionController;

Route::get('/', function () {
    return view('welcome');
})-> name('home');


Route::get('/crear-cuenta', [LoginRegisterController::class, 'register']) -> name('register');
Route::post('/guardar-credenciales', [LoginRegisterController::class, 'store']) -> name('store');
Route::get('/iniciar-sesion', [LoginRegisterController::class, 'login']) -> name('login');
Route::post('/autenticar', [LoginRegisterController::class, 'authenticate']) -> name('authenticate');

Route::get('/email/verify/{id}/{hash}', [EmailVerificacion::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificacion::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/verificar-email', [EmailVerificacion::class, 'verification']) ->middleware(['auth', 'throttle:6,1']) -> name('verification.notice');
Route::post('/email/resend', [EmailVerificacion::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
Route::post('/cerrar-sesion', [LoginRegisterController::class, 'logout'])-> name('logout');
 
Route::post('/password-recovery', [PasswordRecovery::class, 'recovery']) -> name('password.recovery');
Route::get('/cambiar-password/{token}', [PasswordRecovery::class, 'edit'])->name('password.edit');
Route::post('/update-password', [PasswordRecovery::class, 'update'])->name('password.update');

Route::get('/servicios/sistema-de-recomendacion', [RecomendacionController::class, 'index'])-> middleware(['auth','verified'])  -> name("recommend.system");
Route::get('/servicios/sistema-de-recomendacion/clones-detalles', [RecomendacionController::class, 'show'])-> middleware(['auth','verified']) -> name("clones.show");

Route::post('/get-recommendations', [RecomendacionController::class, 'get_recommend'])-> middleware(['auth','verified']) -> name("clones.recommend");
Route::get('/servicios/sistema-de-recomendacion/item/{id}', [CloneController::class, 'show'])-> middleware(['auth','verified']) -> name("clones.item");
