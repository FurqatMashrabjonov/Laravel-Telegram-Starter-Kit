<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/{token}/webhook', function (){
    Telegram::setConnectTimeOut(1);
    $update = Telegram::commandsHandler(true);
    return 'ok';
});

Route::get('/getMe', [\App\Http\Controllers\BotController::class, 'show']);
