<?php

namespace Gemy\ChatGptTrans\App;

use Illuminate\Support\Facades\Http;

class ChatGptTrans
{
    protected $target;
    protected $text;

    public function __construct($target = 'en')
    {
        $this->setTarget($target);
    }

    public function transText($text,$saveInTransFile=false)
    {

        $url = "https://api.openai.com/v1/chat/completions";
        $token = env('TRANS_KEY');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$token}",
        ])
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "trans '$text' to '{$this->target}' without explan",
                    ],
                ],
            ]);

        $assistantResponse = $response['choices'][0]['message']['content'] ?? null;

        if ($assistantResponse != null && $saveInTransFile) {
            $filePath = resource_path("lang/{$this->target}/trans.php");
            if (!file_exists($filePath)) {
                file_put_contents($filePath, "<?php\n\nreturn [];");
            }
            $lang_array = include($filePath);
            $processed_key = ucfirst(str_replace('_', ' ', $this->remove_invalid_charcaters($text)));
            if (!array_key_exists($processed_key, $lang_array)) {
                $lang_array[$processed_key] = $assistantResponse;
                $str = "<?php return " . var_export($lang_array, true) . ";";
                file_put_contents(resource_path("lang/{$this->target}/trans.php"), $str);
            }
        }

        return $assistantResponse;


    }

    public function setTarget(string $target): self
    {
        $this->target = $target;
        return $this;
    }

    private function remove_invalid_charcaters($str)
    {
        return str_ireplace(['\'', '"', ',', ';', '<', '>'], ' ', $str);
    }
}
