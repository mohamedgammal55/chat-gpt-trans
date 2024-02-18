<?php

namespace Gemy\ChatGptTrans;

use Illuminate\Support\Facades\Facade;

class ChatGptTransApi extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "chat-gpt-trans";
    }

}
