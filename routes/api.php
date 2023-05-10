<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/{token}/webhook', function (){
    $response = Telegram::setWebhook(['url' => config('telegram.bots.mybot.webhook_url') . '/' . config('telegram.bots.mybot.token') .'/webhook']);
    return response()->json($response);
});

Route::get('/getMe', [\App\Http\Controllers\BotController::class, 'show']);