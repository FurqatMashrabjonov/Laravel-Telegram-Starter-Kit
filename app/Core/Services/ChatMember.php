<?php

namespace App\Core\Services;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class ChatMember
{
    public static function checkChatMember(int|string $user_id): bool
    {
        $channelIds = config('telegram.channels_id');
        foreach ($channelIds as $channelId){
            $res = Telegram::getChatMember(['chat_id' => $channelId, 'user_id' => $user_id]);
            if ($res->status == 'left')
                return false;
        }
      return true;
    }
}
