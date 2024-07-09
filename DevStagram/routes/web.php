<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home')->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']) -> name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

// Get´s con variable
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//Like a las fotos
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');

// Siguiendo a Usuarios
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

//php artisan route:cache
//php artisan route:list


