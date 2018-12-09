<?php

$start = microtime(true);

$input = file_get_contents('input');
$freqs_raw = explode("\n", $input);
$freqs = array_map('intval', $freqs_raw);

$current_freq = 0;
$freqs_calculated = [];
$duplicate_found = false;
$iterations = 0;


while (!$duplicate_found) {
    foreach ($freqs as $freq) {
        $current_freq += $freq;

        if (isset($freqs_calculated[$current_freq])) {
            $duplicate_found = true;
            break;
        }

        $freqs_calculated[$current_freq] = true;
    }

    if ($duplicate_found) {
        break;
    }

    $iterations++;
}

$elapsed = microtime(true) - $start;
$unit = 's';

if ($elapsed < 1.0) {
    $elapsed *= 1000;
    $unit = 'ms';
}

echo "Duplicate freq: " . $current_freq . "\n";
echo "Iterations: " . $iterations . "\n";
echo "Execution time: " . $elapsed . $unit . "\n";

var_dump($freqs_calculated);

//var_dump($freqs);