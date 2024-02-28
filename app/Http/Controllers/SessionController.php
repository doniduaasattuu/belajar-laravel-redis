<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function set(Request $request): JsonResponse
    {
        $name = $request->get('name');

        $request->session()->put($name, [
            'name' => fake()->name(),
            'country' => fake()->country(),
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function get(Request $request): JsonResponse
    {
        $name = $request->query('name');
        $value = $request->session()->get($name);
        return response()->json($value);
    }
}
