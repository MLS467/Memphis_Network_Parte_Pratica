<?php

use App\Http\Controllers\Products\MainController;
use Illuminate\Support\Facades\Route;


Route::resource('/products', MainController::class);