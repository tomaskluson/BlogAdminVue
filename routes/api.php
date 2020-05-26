<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//ochrana obalení jestli user poslal i svůj klíč
<<<<<<< HEAD
//zobrazí se data pouze přihlášeným uživatelům 
/* Route::middleware(['auth:api'])->group(function () { */
=======
Route::middleware('auth:api')->group(function () {
>>>>>>> d2bfc703500574879a665e08d4083c382f8043dd
    Route::apiResources([
        'posts' => 'API\PostController',
        'users' => 'API\UserController',
        'comments' => 'API\CommentController'
    ]);
<<<<<<< HEAD
/* }); */
=======
});
>>>>>>> d2bfc703500574879a665e08d4083c382f8043dd
    
    