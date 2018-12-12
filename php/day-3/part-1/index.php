<?php

$input = explode("\n", file_get_contents('input'));

$rectangles = [];
$coordinates_taken = [];
$overlapping_count = 0;

foreach ($input as $line) {
    $temp = explode(' ', $line);
    $coordinates = explode(',', $temp[2]);
    $size = explode('x', $temp[3]);
    
    $rectangle = [
        'id' => $temp[0],
        'left' => $coordinates[0],
        'top' => substr($coordinates[1], 0, strlen($coordinates[1]) - 1),
        'width' => $size[0],
        'height' => $size[1]
    ];

    $rectangles[] = $rectangle;
}

foreach ($rectangles as $rectangle) {
    for ($xi=1; $xi <= $rectangle['width']; $xi++) { 
        for ($yi=1; $yi <= $rectangle['height']; $yi++) { 
            $position = ($rectangle['left'] + $xi) . ',' . ($rectangle['top'] + $yi);

            if (!isset($coordinates_taken[$position])) {
                $coordinates_taken[$position] = [$rectangle['id']];
            } else {
                if (count($coordinates_taken[$position]) === 1) {
                    $overlapping_count++;
                }
                
                $coordinates_taken[$position][] = $rectangle['id'];
            }
        }
    }
}

echo "Overlapping inches: " . $overlapping_count . "\n";