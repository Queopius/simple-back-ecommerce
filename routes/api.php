<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\{ShowCategoryController, ShowReviewController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */
Route::get('/v1/category/{id}', [ShowCategoryController::class, 'show']);
Route::get('/v1/review/{id}', [ShowReviewController::class, 'show']);
/* Route::group(['middleware' => ['auth:sanctum']], function () {
}); */
