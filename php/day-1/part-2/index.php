<?php

$start = microtime(true);

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
$freqs_calculated = [];
$duplicate_found = false;
$iterations = 0;


while (!$duplicate_found) {
    foreach ($freqs as $freq) {
        if ($freq['operation'] === '-') {
            $current_freq -= $freq['value'];
        } else {
            $current_freq += $freq['value'];
        }

        if (in_array($current_freq, $freqs_calculated)) {
            $duplicate_found = true;
            break;
        }

        $freqs_calculated[] = $current_freq;
    }

    if ($duplicate_found) {
        break;
    }

    $iterations++;
}

$elapsed = microtime(true) - $start;

echo "Duplicate freq: " . $current_freq . "\n";
echo "Iterations: " . $iterations . "\n";
echo "Execution time: " . $elapsed . "\n";

//var_dump($freqs);