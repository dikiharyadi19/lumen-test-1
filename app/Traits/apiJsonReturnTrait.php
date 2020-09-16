<?php

namespace App\Traits;

trait apiJsonReturnTrait
{
    public function returnJson($data = '', $status_code = 200, $status = 'success')
    {
        return response()->json([
            'status'  => $status,
            'data'  => $data,
            'code'    => $status_code,
        ], $status_code);
    }
}
