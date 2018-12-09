<?php

$input = file_get_contents('input');
$freqs_raw = explode("\n", $input);
$freqs = [];

foreach ($freqs_raw as $freq) {
    $operation = substr($freq, 0, 1);
    $value = (int)substr($freq, 1);

    $freqs[] = [
        'operation' => $operation,
        'value' => $value
    ];
}

$current_freq = 0;

foreach ($freqs as $freq) {
    if ($freq['operation'] === '-') {
        $current_freq -= $freq['value'];
    } else {
        $current_freq += $freq['value'];
    }
}

echo $current_freq . "\n"; 

//var_dump($freqs);