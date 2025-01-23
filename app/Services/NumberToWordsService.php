<?php

namespace App\Services;

class NumberToWordsService
{
    public function convert($number)
{
    $words = [
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
        15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen',
        20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty',
        60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    ];

    $divisions = [1000 => 'thousand', 100 => 'hundred'];

    // Ensure the input is treated as a string
    $number = ltrim((string) $number, '0');

    // Handle edge case: If the number becomes an empty string after removing leading zeros
    if ($number === '') {
        return $words[0];
    }

    // Convert the number back to an integer for processing
    $number = intval($number);

    if ($number < 20) {
        return $words[$number];
    } elseif ($number < 100) {
        return $words[intval($number / 10) * 10] . (($number % 10) ? ' ' . $words[$number % 10] : '');
    } elseif ($number < 1000) {
        return $words[intval($number / 100)] . ' hundred' . (($number % 100) ? ' ' . $this->convert($number % 100) : '');
    } else {
        foreach ($divisions as $value => $label) {
            if ($number >= $value) {
                return $this->convert(intval($number / $value)) . ' ' . $label . (($number % $value) ? ' ' . $this->convert($number % $value) : '');
            }
        }
    }
}
}
