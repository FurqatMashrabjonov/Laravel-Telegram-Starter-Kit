<?php

namespace App\Telegram\Commands;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Exceptions\CouldNotUploadInputFile;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class ChatIdCommand extends Command
{
    protected string $name = 'chatid';
    protected string $description = 'Chatni idisini olish';

    public function handle()
    {
        if (isset($this->update->message)) {
            $this->replyWithMessage(['text' => sprintf("Channel ID: %s", $this->update->message->chat->id)]);
        } else {
            $this->replyWithMessage(['text' => sprintf("Channel ID: %s", $this->update->channelPost->chat->id)]);
        }
    }
}
