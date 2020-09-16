<?php

namespace App\Traits;

trait apiJsonReturnTrait
{
    public function returnJson($data = '', $status = 'success')
    {
        return response()->json([
            'status'  => $status,
            'data'  => $data,
        ]);
    }
}
