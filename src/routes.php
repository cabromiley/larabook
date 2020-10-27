<?php

use Illuminate\Support\Facades\Route;
use Cabromiley\Larabook\Http\Controllers\DocumentationController;

Route::group([
    'middleware' => config('larabook.routes.middleware'),
    'prefix' => config('larabook.routes.prefix'),
    'as' => config('larabook.routes.alias'),
], function () {
    Route::get('/', [ DocumentationController::class, 'index' ])->name('index');
    Route::get('{component}', [ DocumentationController::class, 'index' ])->name('show');
});
