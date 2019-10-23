<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;

class CaptchaController extends Controller
{
    //
    public function index()
    {
        return Captcha::create();
    }
}
