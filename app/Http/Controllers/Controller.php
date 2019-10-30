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
        return response()
            ->json(['code' => $code, 'msg' => $msg, 'data' => $this->deleteNull($data)])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'x-requested-with,content-type,Authorization');
    }

    protected function error($msg = 'error', $code = 1)
    {
        return response()->json(['code' => $code, 'msg' => $msg])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'x-requested-with,content-type,Authorization');
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
