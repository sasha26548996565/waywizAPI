<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Openai;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Openai\GPTBotApiContract;
use App\Http\Requests\Api\Openai\MessageRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class BotController extends Controller
{
    public function __construct(
        private GPTBotApiContract $gptBotApi,
    ) {}

    public function renderPage(): View
    {
        return view('bot.index');
    }

    public function sendMessage(MessageRequest $request): JsonResponse
    {
        try {
            $params = $request->validated();
            $user = User::findOrFail(Auth::user()->id);

            if ($user->isAvailable() == false) {
                throw new \Exception('No available!');
            }

            $message = $this->gptBotApi->sendMessage($params['text']);

            Message::create([
                'text' => $params['text'],
                'user_id' => $user->id,
                'is_user' => true
            ]);

            Message::create([
                'text' => $message,
                'user_id' => $user->id,
                'is_user' => false
            ]);

            return response()->json([
                'message' => $message
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
