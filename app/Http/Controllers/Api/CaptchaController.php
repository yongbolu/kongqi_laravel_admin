<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mews\Captcha\Facades\Captcha;

class CaptchaController extends Controller
{
    //
    public function index($type=1){
        switch ($type)
        {
            case '1':
                return Captcha::create();
                break;
            case '2':

                return Captcha::create('mini');
                break;
            case '3':

                return Captcha::create('math');
                break;
            case '4':

                return Captcha::create('flat');
                break;
            case '5':

                return Captcha::create('inverse');
                break;
        }



    }
}
