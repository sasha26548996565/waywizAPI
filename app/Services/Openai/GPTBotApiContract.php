<?php

declare(strict_types=1);

namespace App\Services\Openai;

interface GPTBotApiContract
{
    public function sendMessage(string $message): string;
}
