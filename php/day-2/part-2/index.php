<?php

$input = explode("\n", file_get_contents('input'));

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

//$checksum = count($matches['two']) * count($matches['three']);

/* echo "Matches found two: " . count($matches['two']) . "\n";
echo "Matches found three: " . count($matches['three']) . "\n";
echo "Checksum: " . $checksum . "\n"; */

$all_matches = array_merge($matches['two'], $matches['three']);

//var_dump($all_matches[0], $all_matches[0][0]);

$best_match = '';

foreach ($all_matches as $key => $match) {
    $string_length = strlen($match);
    //echo $match . "\n";

    foreach ($all_matches as $key_inner => $match_inner) {
        if ($key === $key_inner) {
            continue;
        }

        $matching_chars = '';
        
        for ($i=0; $i < $string_length; $i++) { 
            if ($match[$i] === $match_inner[$i]) {
                $matching_chars .= $match_inner[$i];
            }
        }

        if (strlen($matching_chars) === $string_length - 1) {
            $best_match = $matching_chars;
        }
    }
}

echo "Best match: " . $best_match . "\n";