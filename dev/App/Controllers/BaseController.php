<?php

namespace Dev\App\Controllers;

class BaseController
{
    public static function render($view, $variables = null) {
        foreach($variables as $key => $var) {
            $$key = json_decode(json_encode($var));
        }
        require_once('./ui/view/'. $view . '.php');
    }
}