<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success($data = [], $msg = 'success', $code = 0)
    {
        return response()->json(['code' => $code, 'msg' => $msg, 'data' => $this->deleteNull($data)]);
    }

    protected function error($msg = 'error', $code = 1)
    {
        return response()->json(['code' => $code, 'msg' => $msg]);
    }

    private function deleteNull($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                unset($data[$key]);
                $data[Str::camel($key)] = $this->deleteNull($val);
            }
            return $data;
        } else {
            if (is_null($data)) {
                return '';
            } else {
                return $data;
            }
        }
    }
}
