<?php

namespace App\Helpers\Traits;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Api Responcer Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait ApiResponcer
{
    /*
       * Return a success JSON response.
       *
       * @param  array|string  $data
       * @param  string  $message
       * @param  int|null  $code
       * @return \Illuminate\Http\JsonResponse
       */
    protected function success($data=null, string $message = "", int $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /*
       * Return an error JSON response.
       *
       * @param  string  $message
       * @param  int  $code
       * @param  array|string|null  $data
       * @return \Illuminate\Http\JsonResponse
       */
    protected function error(string $message = "", int $code, $data = null)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

}

