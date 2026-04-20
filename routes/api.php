<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

Route::get('/content', [ContentController::class, 'index']);

Route::prefix('/listar')->group(function () {
	Route::get('/peliculas', [PeliculaController::class, 'listar']);
});
