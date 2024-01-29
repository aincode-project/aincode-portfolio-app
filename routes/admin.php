<?php

use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use Illuminate\Support\Facades\Route;

Route::resource('hero', HeroController::class);
Route::resource('typer-title', TyperTitleController::class);
Route::resource('service', ServiceController::class);
