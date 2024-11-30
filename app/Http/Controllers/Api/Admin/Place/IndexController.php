<?php

namespace App\Http\Controllers\Api\Admin\Place;

use App\Models\Place;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $places = Place::with('industry')->orderBy('id', 'DESC')->get();

        return response()->json(compact('places'));
    }
}
