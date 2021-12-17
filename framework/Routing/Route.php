<?php

namespace Sketch\Framework\Routing;

class Route
{
    public static $validRoutes = array();

    public static function get($route, $function) {
        self::$validRoutes[] = $route;

        if($_GET['url'] == $route) {
            $function->__invoke();
        }
    }

}