<?php

declare(strict_types=1);

namespace App\Services\Openai;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Http;

class GPTBotApi implements GPTBotApiContract
{
    public const HOST = 'https://api.openai.com/v1/chat/completions';

    public function sendMessage(string $message): string
    {
        try {
            $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . config('openai.token')
            ])
            ->post(self::HOST, [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => config('context.additional_info') . $message
                    ],
                    [
                        'role' => 'system',
                        'content' => config('context.text')
                    ],
                ],
                'model' => 'gpt-3.5-turbo',
                'temperature' => 0.7,
                'max_tokens' => 300
            ]);

            $message = $response->json()['choices'][0]['message']['content'];

            return $message;
        } catch (Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
