<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DestroyController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        User::findOrFail($id)->delete();

        return response()->json([
            'status' => true
        ]);
    }
}
