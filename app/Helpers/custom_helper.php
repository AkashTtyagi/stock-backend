<?php
use Illuminate\Support\Carbon;

//...

function pp($arr, $die = "true")
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    if ($die == 'true') {
        die();
    }
}

function parseDateFormat($date, $format = 'Y-m-d')
{
    if (empty($date))
        return null;
    return Carbon::parse($date, 'UTC')->format($format);
}