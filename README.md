<p align="center"><img src="logo.svg" alt="Chat GPT Translation" style="width: 50%"></p>

<p align="center">
<a href="https://github.com/mohamedgammal55/chat-gpt-trans/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/gemy/chat-gpt-trans"><img src="https://img.shields.io/packagist/dt/gemy/chat-gpt-trans" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/gemy/chat-gpt-trans"><img src="https://img.shields.io/packagist/v/gemy/chat-gpt-trans" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/gemy/chat-gpt-trans"><img src="https://img.shields.io/packagist/l/gemy/chat-gpt-trans" alt="License"></a>
</p>

## Chat GPT Translation

Translation library using Chat-gpt

## Installation

You can install the package via composer:

```bash
composer require gemy/chat-gpt-trans
```

## Edit in env file
```
TRANS_KEY=your_chat_gpt_token
```

## The code

```
use Gemy\ChatGptTrans\App\ChatGptTrans;

class HomeController extends Controller
{
    public function transText()
    {
         $string = "مساج الحجارة الساخنة والأعشاب";
         /// If you don`t need to save it in a file, write it like this
         $text = new ChatGptTrans('en',false);
         ////
          $text = new ChatGptTrans('en',true);
    }
}
```

#### If the response is null then there is an error
