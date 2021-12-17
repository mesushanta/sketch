<?php

namespace Dev\App\Controllers;
use Dev\App\Controllers\BasesController;

class WelcomeController extends BaseController
{
    public static function welcome() {
        self::render('welcome',[
            "first" => 'I am a variable',
            "second" => [
                "third" => "I am nested variable"
            ]
        ]);
    }
}