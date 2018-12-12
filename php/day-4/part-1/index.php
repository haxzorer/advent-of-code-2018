<?php

$input = explode("\n", file_get_contents('input'));



sort($input);

var_dump($input);

/* $guard_details = [];

foreach ($input as $guard_raw) {
    $guard = [];
}

$temp = '1518-11-07 00:21';
$date_time = date_create_from_format('Y-m-d H:i', $temp); */

//var_dump('1518-11-07 00:21', strtotime('1518-11-07 00:21'), date('Y-m-d H:i', strtotime('1518-11-07 00:21')));
//var_dump($date_time);