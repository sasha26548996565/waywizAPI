<?php

namespace App\Providers;

use App\Services\Openai\GPTBotApi;
use Illuminate\Support\ServiceProvider;
use App\Services\Openai\GPTBotApiContract;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(GPTBotApiContract::class, GPTBotApi::class);
    }
}
