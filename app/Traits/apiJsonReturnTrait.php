<?php

namespace App\Traits;

trait apiJsonReturnTrait
{
    public function returnJson($data = '', $status_code = 200, $status = 'success')
    {
        return response()->json([
            'status'  => $status,
            'code'    => $status_code,
            'data'  => $data,
        ], $status_code);
    }
}
