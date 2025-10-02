<?php

if (!function_exists('set_active')) {
    function set_active($uri, $output = "active") {
        $currentPath = uri_string(); // ambil URI saat ini
        if ($uri === $currentPath || (is_array($uri) && in_array($currentPath, $uri))) {
            return $output;
        }
        return '';
    }
}
