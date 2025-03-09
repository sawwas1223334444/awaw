<?php

$numbers = [];
for ($i = 1; $i < 1000; $i++) {
    $numbers[] = $i;
}


function proverka(array $numbers, callable $condition): array
{
    $result = [];
    foreach ($numbers as $number) {
        if ($condition($number)) {
            $result[] = $number;
        }
    }
    return $result;
}

$uslovieIdeala = function (int $number): bool {
    $sumDelit = 1; 
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            $sumDelit += $i;
        }
    }
    return $number === $sumDelit && $number > 1;
};


$uslovieSover = function (int $number): bool {
    $sumDelit = 0;
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i === 0) {
            $sumDelit += $i;
        }
    }
    $polSumDelit = $sumDelit / 2;
    return $number === $polSumDelit;
};


echo "Идеальные числа:" . PHP_EOL;
$idealChisla = proverka($numbers, $uslovieIdeala);
foreach ($idealChisla as $number) {
    echo $number . PHP_EOL;
}

echo "Совершенные числа:" . PHP_EOL;
$soverChisla = proverka($numbers, $uslovieSover);
foreach ($soverChisla as $number) {
    echo $number . PHP_EOL;
}
