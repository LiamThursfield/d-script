<?php

if (!function_exists('format_directory_path')) {
    function format_directory_path(string $path = ''): string
    {
        $path = trim($path);

        if (strlen($path) === 0) {
            return $path;
        }

        $path = str_replace('//', '/', $path);

        return $path;
    }
}
