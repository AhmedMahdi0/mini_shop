<?php

namespace App\Providers;


use Illuminate\Http\Response;

class CustomResponseService
{
    public static function response()
    {
        Response::macro('customResponse', function ($message, $data = [], $statusCode = 200) {
            $responseData = [
                'message' => $message,
            ];
            if (!empty($data)) {
                $responseData['data'] = $data;
            }
            return response()->json($responseData, $statusCode);
        });
    }
}
