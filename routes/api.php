<?php

use App\Http\Controllers\WebhooksController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any('/webhook', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}', [WebhooksController::class, 'handle']);












































// Route::any('/webhook/{id}/{secret}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}/{edited_timestamp}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}/{edited_timestamp}/{deleted_timestamp}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}/{edited_timestamp}/{deleted_timestamp}/{message_id}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}/{edited_timestamp}/{deleted_timestamp}/{message_id}/{message_type}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}/{edited_timestamp}/{deleted_timestamp}/{message_id}/{message_type}/{message_subtype}', [WebhooksController::class, 'handle']);
// Route::any('/webhook/{id}/{secret}/{token}/{channel}/{user}/{message}/{attachments}/{reaction}/{reaction_user}/{reaction_count}/{timestamp}/{edited_timestamp}/{deleted_timestamp}/{message_id}/{message_type}/{message_subtype}/{message_text}', [WebhooksController::class, 'handle']);



