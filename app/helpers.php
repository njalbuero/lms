<?php
if (!function_exists('status')) {
    function status($number)
    {
        $color = '';
        switch ($number) {
            case 1:
                $color = 'default';
                break;
            case 2:
                $color = 'primary';
                break;
            case 3:
                $color = 'orange';
                break;
            case 4:
                $color = 'info';
                break;
            case 5:
                $color = 'purple';
                break;
            case 6:
                $color = 'yellow';
                break;
            case 7:
                $color = 'success';
                break;
            case 7:
                $color = 'success';
                break;
            case 7:
                $color = 'danger';
                break;
        }
        return $color;
    }
}

if (!function_exists('progress')) {
    function progress($number)
    {
        $color = '';
        switch ($number) {
            case 1:
                $color = 16;
                break;
            case 2:
                $color = 32;
                break;
            case 3:
                $color = 48;
                break;
            case 4:
                $color = 64;
                break;
            case 5:
                $color = 80;
                break;
            case 6:
                $color = 96;
                break;
            case 7:
                $color = 100;
                break;
            case 8:
                $color = 100;
                break;
            case 9:
                $color = 100;
                break;
        }
        return $color;
    }
}


if (!function_exists('formatInstructions')) {
    function formatInstructions($text)
    {
        return strlen($text) < 30 ? $text : substr($text, 0, 30) . '...';
    }
}
