<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

abstract class Controller
{
    public function sendResponse($result, $message, $extra = []): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
            'extra' => $extra,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (! empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function sendInertiaResponse($component, $props = [], $extra = []): \Inertia\Response
    {
        return Inertia::render($component, $props)->withViewData($extra);
    }

    public function redirectToIndex($parentRoute): RedirectResponse
    {
        return to_route($parentRoute.'.index');
    }
}
