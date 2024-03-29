<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Models\PortfolioSectionSetting;
use Illuminate\Support\Facades\Route;

Route::resource('hero', HeroController::class);

Route::resource('typer-title', TyperTitleController::class);

Route::resource('service', ServiceController::class);

Route::resource('about', AboutController::class);

Route::resource('portfolio-category', PortfolioCategoryController::class);

Route::resource('portfolio-item', PortfolioItemController::class);

Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);
