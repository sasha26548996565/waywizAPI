<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/{page}', IndexController::class)
    ->where('page', '.*');
