<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $users = User::all();

        return response()->json(compact('users'));
    }
}
