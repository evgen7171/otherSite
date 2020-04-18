<?php

if (!function_exists('asset')) {
    function asset($path)
    {
        return 'public/' . $path;
    }
}