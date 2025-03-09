<?php

function isPerfectNumber($number) {
    if ($number < 1) {
        return false; 
    }

    $sum = 0; 

    for ($i = 1; $i <= $number / 2; $i++) {
        if ($number % $i === 0) { 
            $sum += $i; 
        }
    }

    return $sum === $number;
}

function findPerfectNumber($array) {
    foreach ($array as $number) {
        if (isPerfectNumber($number)) {
            return $number; 
        }
    }
    return null; 
}

$numbers = [8, 12, 16, 29, 15, 567, 8128];
$perfectNumber = findPerfectNumber($numbers);

if ($perfectNumber !== null) {
    echo "Найдено идеальное число: $perfectNumber"; 
} else {
    echo "Идеальных чисел в массиве нет.";
}