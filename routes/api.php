<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::apiResources([
    'products' => ProductController::class,
]);

 Проблемка, не проходит валидацию в таком виде из-за неподходящего значения для category_id, не получилось разобраться, почему так, потому такой костыль
 * */

Route::group([],function () {
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('/public')->group(function () {
    Route::get('/products', [\App\Http\Controllers\PublicController::class, 'index']);
    Route::get('/products/{product:slug}', [\App\Http\Controllers\PublicController::class, 'show']);
    Route::get('/product_categories', [\App\Http\Controllers\PublicController::class, 'showCategory']);
    Route::get('/all', [\App\Http\Controllers\PublicController::class, 'showCategoryWithProducts']);
});
