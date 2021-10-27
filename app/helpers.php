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
                $color = 'secondary';
                break;
            case 4:
                $color = 'info';
                break;
            case 5:
                $color = 'success';
                break;
            case 6:
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
                $color = 20;
                break;
            case 2:
                $color = 40;
                break;
            case 3:
                $color = 60;
                break;
            case 4:
                $color = 80;
                break;
            case 5:
                $color = 100;
                break;
            case 6:
                $color = 100;
                break;
            case 7:
                $color = 100;
                break;
        }
        return $color;
    }
}
