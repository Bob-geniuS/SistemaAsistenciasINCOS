<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY');

        if ($apiKey !== config('services.api_secret')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. Invalid API key.',
            ], 401);
        }

        return $next($request);
    }
}
