<?php

namespace App\Listeners\Callback;

use App\Events\Callback\IncomingCall;
use Telegram;

class SendIncomingСallNotification
{
    /**
     * Handle the event.
     *
     * @param  IncomingCall  $event
     * @return void
     */
    public function handle(IncomingCall $event)
    {
        foreach ($event->calls as $call) {
            $phoneNumber = phone($call['callerNumberFull'], 'RU', 'international');
            $this->sendTelegram($phoneNumber);
        }
    }

    protected function sendTelegram($phoneNumber)
    {
        $telegram = new Telegram(env('TELEGRAM_BOT_API_KEY'));

        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'), // 151840872
            'text'    => "Гау-у-у. Вам звонит номер\r\n{$phoneNumber}"
        ]);
    }
}
