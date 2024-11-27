<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Openai;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends Controller
{
    public function __invoke(Request $request, int $userId): JsonResponse
    {
        $messages = Message::with('user')->where('user_id', $userId)->get();

        return response()->json(compact('messages'));
    }
}
