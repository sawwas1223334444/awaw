<?php

function mostRecent($text) {

    if (strlen($text) > 1000) {
        return "Текст слишком длинный";
    }

    $text = strtolower($text);
    $text = preg_replace('/[^\w\s]/u', '', $text);

    $words = explode(' ', $text);

    $words = array_filter($words, function($word) {
        return !empty($word);
    });

    if (empty($words)) {
        return "Текст не содержит слов";
    }

    $wordCounts = array_count_values($words); 

    $maxCount = max($wordCounts);

    $mostFrequentWords = array_keys($wordCounts, $maxCount);

    return $mostFrequentWords;
}

$text = "Животные, птица, рыба, змеи, рыба, зверь, собака.";
$result = mostRecent($text);

if (is_array($result)) {
    echo "Самое частое слово: " . implode(', ', $result);
} else {
    echo $result; 
}