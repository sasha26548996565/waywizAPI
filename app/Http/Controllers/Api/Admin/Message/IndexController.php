<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin\Message;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $messages = Message::with('user')->get();

        return response()->json(compact('messages'));
    }
}
