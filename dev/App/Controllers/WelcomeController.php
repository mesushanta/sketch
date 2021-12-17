<?php

namespace Dev\App\Controllers;

use Dev\App\Controllers\BasesController;
use Dev\App\Models\User;

class WelcomeController extends BaseController
{
    public static function welcome() {

        $user = new User();
        $user->firstname = "Sushanta";
        $user->lastname = "Pyakurel";
        $user->email = "pyakurelsushanta@gmail.com";
        $user->phone = "04841830151";
        $user->classroom_id = 2;

        $create = $user->create();
        if($create) {
           $msg = "User created in db";
        }
        else {
            $msg = "User could not be created";
        }

        self::render('welcome',[
            "message" => $msg,
            "first" => 'I am a variable',
            "second" => [
                "third" => "I am nested variable"
            ]
        ]);
    }
}