<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin\Message;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DestroyController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        Message::findOrFail($id)->delete();

        return response()->json([
            'status' => true
        ]);
    }
}
