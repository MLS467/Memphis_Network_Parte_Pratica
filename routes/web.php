<?php

use App\Http\Controllers\Products\MainController;
use Illuminate\Support\Facades\Route;


/**
 * Nomes das Rotas usando resource
 * 
 * GET	/products	products.index	index
 * GET	/products/create	products.create	create
 * POST	/products	products.store	store
 * GET	/products/{product}	products.show	show
 * GET	/products/{product}/edit	products.edit	edit
 * PUT	/products/{product}	products.update	update
 * DELETE	/products/{product}	products.destroy	destroy
 */
Route::resource('/products', MainController::class);