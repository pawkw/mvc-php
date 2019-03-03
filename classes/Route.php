<?php

class Route {

    public static $validRoutes = array();

    public static function set($route, $nav, $label, $function) {
        self::$validRoutes[$route] = array(
            'putInNavMenu' => $nav, // Boolean: Include in nav menu?
            'label' => $label, // Label to put in nav menu.
            'function' => $function
        );
    }

    public static function isValid($url) {
        if(array_key_exists($url, self::$validRoutes)) {
            return self::$validRoutes[$url];
        } else {
            return false;
        }
    }

    public static function getNavList() {
        return array_filter(self::$validRoutes, function($x) {
            return $x['putInNavMenu'];
        });
    }

    public static function getTitle($url) {
        if(array_key_exists($url, self::$validRoutes)) {

            echo self::$validRoutes[$url]['label'];
            die();
        } else {
            return 'dave';
        }
    }
}
