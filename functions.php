<?php
function convertDecimal($decimal, $type) {
    if (!in_array($type, [2, 8, 16])) { //checking if argument type is correct
        return "Wrong type of conversion";
    }
    
    if ($decimal === 0){
        return 0;
    }

    $numbersTest = str_split($decimal);
    for ($i = 0; $i < count($numbersTest); $i++) { //testing if the input number is decimal
        if (!in_array($numbersTest[$i], ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])) {
            return "Wrong number";
        }
    }

    $convertedNumber = []; 

    if ($type == 16) { //when we convert to hexadecimal we have to use function numbersToLetters
        while ($decimal != 0) {
            $convertedNumber[] = numbersToLetters($decimal % $type);
            $decimal = floor($decimal / $type);
        }
    } else {
        while ($decimal != 0) {
            $convertedNumber[] = ($decimal % $type);
            $decimal = floor($decimal / $type);
        }
    }

    $convertedNumber = array_reverse($convertedNumber);
    return implode("", $convertedNumber);
}

function numbersToLetters($number) { //changing numbers from 10-15 to letters when we convert to hexadecimal
    if ($number > 9) {
        switch ($number) {
            case 10:
                return 'A';
            case 11:
                return 'B';
            case 12:
                return 'C';
            case 13:
                return 'D';
            case 14:
                return 'E';
            case 15:
                return 'F';
        }
    }
    return $number;
}

function lettersToNumbers($number) { //changing letters to numbers 10-15 when we convert from hexadecimal
    if (in_array($number, ['A', 'B', 'C', 'D', 'E', 'F'])) {
        switch ($number) {
            case 'A':
                return 10;
            case 'B':
                return 11;
            case 'C':
                return 12;
            case 'D':
                return 13;
            case 'E':
                return 14;
            case 'F':
                return 15;
        }
    }
    return $number;
}

function binaryToDecimal($binary) {

    $decimal = 0;
    $binaryArray = array_reverse(str_split($binary));

    foreach ($binaryArray as $key => $number) {
        if (!in_array($number, ['0', '1'])) {
            return "Wrong number";
        }
        $decimal += $number * pow(2, $key);
    }

    return $decimal;
}

function octalToDecimal($octal) {

    $decimal = 0;
    $octalArray = array_reverse(str_split($octal));

    foreach ($octalArray as $key => $number) {
        if (!in_array($number, ['0', '1', '2', '3', '4', '5', '6', '7'])) {
            return "Wrong number";
        }
        $decimal += $number * pow(8, $key);
    }

    return $decimal;
}

function hexadecimalToDecimal($hexadecimal) {
    $hex= strtoupper($hexadecimal);
    $decimal = 0;
    $octalArray = array_reverse(str_split($hex));

    foreach ($octalArray as $key => $number) {
        if (!in_array($number, ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'])) {
            return "Wrong number";
        }
        $decimal += lettersToNumbers($number) * pow(16, $key);
    }

    return $decimal;
}
