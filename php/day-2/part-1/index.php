<?php

$input = explode("\n", file_get_contents('input'));

//var_dump($input);

$matches = [
    'two' => [],
    'three' => []
];

$found_two = false;
$found_three = false;

foreach ($input as $box_id) {
    $chars = str_split($box_id);

    foreach ($chars as $char) {
        if ($found_two && $found_three) {
            break;
        }

        if ($found_two === false && substr_count($box_id, $char) === 2) {
            $matches['two'][] = $box_id;
            $found_two = true;
            continue;
        }

        if ($found_three === false && substr_count($box_id, $char) === 3) {
            $matches['three'][] = $box_id;
            $found_three = true;
            continue;
        }
        
    }

    $found_two = false;
    $found_three = false;
}

$checksum = count($matches['two']) * count($matches['three']);

echo "Matches found two: " . count($matches['two']) . "\n";
echo "Matches found three: " . count($matches['three']) . "\n";
echo "Checksum: " . $checksum . "\n";
