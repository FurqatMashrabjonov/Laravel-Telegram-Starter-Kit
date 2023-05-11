<?php

namespace App\Telegram\Commands;

use App\Core\Services\ChatMember;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Exceptions\CouldNotUploadInputFile;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Botni ishga tushirish';

    /**
     * @throws CouldNotUploadInputFile
     */
    public function handle()
    {
        $user_id = $this->update->message->from->id;
        Log::debug(ChatMember::checkChatMember($user_id) ? 'true' : 'false');
    }
}
