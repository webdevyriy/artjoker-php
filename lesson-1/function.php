<?php

/*
 * Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.
 * */

function customDecbin($number)
{
    $result = '';

    while ($number > 0) {
        $result = $number % 2 . $result;
        $number = (int)($number / 2);
    }
    return $result;
}

/*
 * Написать функцию, которая выполняет преобразование наоборот.
 *
 * из двоичной системы счисления и преобразовывает в десятичную
 *
 * */
function customBindec($number)
{
    $number_len = strlen($number);
    $result = '';

    for ($i = 0; $i < $number_len; $i++) {
        $result += ((int)$number[$number_len - $i - 1]) * 2 ** $i;
    }

    return $result;
}


/* Найти сумму всех первых N чисел фибоначи */

function sumFibonacci($number)
{
    $result = [0, 1];

    for ($i = 2; $i <= $number; $i++) {
        $prevNumOne = $result[$i - 1];
        $prevNumTwo = $result[$i - 2];
        $result[] = $prevNumOne + $prevNumTwo;
    }

    return $result[$number];
}

/* рекурсивно*/

function sumFibonacciRecursively($number)
{
    if ($number < 2) {
        return $number;
    }

    return sumFibonacciRecursively($number - 1) + sumFibonacciRecursively($number - 2);
}


/*Написать функцию, возведения числа N в степень M*/

function customPow($number, $exponentiation)
{
    $result = $number;
    for ($i = 0; $i < $exponentiation - 1; $i++) {
        $result = $result * $number;
    }

    return $result;
}

/* рекурсивно*/

function customPowRecursively($number, $exponentiation)
{
    if ($exponentiation !== 0) {
        return $number * customPowRecursively($number, $exponentiation - 1);
    }

    return 1;
}


/*
 Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.
 * */

function calculatingIp($startIp, $endIp, $targetIp)
{
    $startIp = str_replace(".", "", $startIp);
    $endIp = str_replace(".", "", $endIp);
    $targetIp = str_replace(".", "", $targetIp);

    $startIp = (int)$startIp;
    $endIp = (int)$endIp;
    $targetIp = (int)$targetIp;

    if ($startIp != 0 && $endIp != 0 && $targetIp != 0) {
        if ($startIp <= $targetIp && $targetIp <= $endIp) {
            return true;
        } else {
           return false;
        }
    }
}

/* Подсчитать процентное соотношение
    Положительных/отрицательных/нулевых/простых чисел
 */


function isPrime($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return $number > 1;
}

function calculatePercentageArray($arr)
{
    $plus = 0;
    $minus = 0;
    $zero = 0;
    $normal = 0;
    $allElement = count($arr);
    if (is_array($arr)) {
        for ($i = 0; $i < $allElement; $i++) {

            if ($arr[$i] > 0) {
                $plus++;
            }

            if ($arr[$i] < 0) {
                $minus++;
            }
            if ($arr[$i] == 0) {
                $zero++;
            }
            if (isPrime($arr[$i])) {
                $normal++;
            }

        }
    }

    $resultObject = [
        'процент положительных чисел' => 100 * $plus / $allElement,
        'процент отрицательных чисел' => 100 * $minus / $allElement,
        'процент нулевых чисел' => 100 * $zero / $allElement,
        'процент простых чисел' => 100 * $normal / $allElement,
    ];


    return $resultObject;

}

/*
 * Отсортировать элементы по возрастанию
 * */

function sortArrayAscending($arr)
{

    $result = $arr;

    for ($i = 0; $i < count($result); $i++) {
        for ($j = 0; $j < count($result) - 1 - $i; $j++) {
            if ($result[$j] > $result[$j + 1]) {
                $two = $result[$j];
                $result[$j] = $result[$j + 1];
                $result[$j + 1] = $two;
            }
        }
    }

    return $result;
}

/*

 * Рекурсивно
 * */


function sortArrayAscendingRecursively($arr)
{
    $count = count($arr);

    if ($count <= 1) {
        return $arr;
    }

    $baseValue = $arr[0];
    $leftArr = $rightArr = array();

    for ($i = 1; $i < $count; $i++) {
        if ($baseValue > $arr[$i]) {

            $leftArr[] = $arr[$i];

        } else {

            $rightArr[] = $arr[$i];
        }
    }

    $leftArr = sortArrayAscendingRecursively($leftArr);
    $rightArr = sortArrayAscendingRecursively($rightArr);

    return array_merge($leftArr, array($baseValue), $rightArr);
}


/* Отсортировать элементы по убыванию*/

function sortArrayDescending($arr)
{
    $result = $arr;

    for ($i = 0; $i < count($result); $i++) {
        for ($j = 0; $j < count($result) - 1 - $i; $j++) {
            if ($result[$j] < $result[$j + 1]) {
                $two = $result[$j];
                $result[$j] = $result[$j + 1];
                $result[$j + 1] = $two;
            }
        }
    }

    return $result;
}


/*

 * Рекурсивно
 * */

function sortArrayDescendingRecursively($arr)
{
    $count = count($arr);
    if ($count <= 1){
        return $arr;
    }


    $baseValue = $arr[0];
    $leftArr = $rightArr = array();

    for ($i = 1; $i < $count; $i++) {
        if ($baseValue > $arr[$i]) {

            $leftArr[] = $arr[$i];
        } else {
            $rightArr[] = $arr[$i];
        }
    }

    $leftArr = sortArrayDescendingRecursively($leftArr);
    $rightArr = sortArrayDescendingRecursively($rightArr);

    return array_merge_recursive($leftArr, array($baseValue), $rightArr);
}


/* Для двумерных массивов Транспонировать матрицу */

function transposeMatrix($arr)
{
    if (!is_array($arr)) {
        return false;
    }

    $result = [];

    foreach ($arr as $key => $value) {
        if (!is_array($value)) {
            return $arr;
        }
        foreach ($value as $key2 => $value2) {
            $result[$key2][$key] = $value2;
        }
    }
    return $result;

}


function sumMatrix($matrixOne, $matrixTwo)
{
    $m = count($matrixOne);
    $n = count($matrixOne[0]);
    $result = [];
    for ($i = 0; $i < $m; $i++) {
        $result[$i] = [];
        for ($j = 0; $j < $n; $j++) {
            $result[$i][$j] = $matrixOne[$i][$j] + $matrixTwo[$i][$j];
        }

    }
    return $result;
}

/*
Удалить строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент
   */

function positiveMatrixRow($arr)
{
    $sumRow = [];

    $rowHasZero = [];

    for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
        for ($j = 0, $jMax = count($arr[$i]); $j < $jMax; $j++) {
            if (!array_key_exists($i, $sumRow)) {
                $sumRow[$i] = 0;
            }

            if (!array_key_exists($i, $rowHasZero)) {
                $rowHasZero[$i] = false;
            }

            $sumRow[$i] += $arr[$i][$j];

            $rowHasZero[$i] = $rowHasZero[$i] || $arr[$i][$j] === 0;

        }
    }
    $result = [];

    for ($i = 0; $i < $iMax; $i++) {
        if ($rowHasZero[$i]) {
            continue;
        }
        for ($j = 0; $j < $jMax; $j++) {

            $result[$i][$j] = $arr[$i][$j];
            if ($j === $jMax - 1) {
                $result[$i] = array_values($result[$i]);
            }
        }
    }
    return array_values($result);
}

/*
 * Удалить те столбцы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 * */
function positiveMatrixColumn($arr)
{

    $sumColumn = [];


    $columnHasZero = [];

    for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
        for ($j = 0, $jMax = count($arr[$i]); $j < $jMax; $j++) {

            if (!array_key_exists($j, $sumColumn)) {
                $sumColumn[$j] = 0;
            }

            if (!array_key_exists($j, $columnHasZero)) {
                $columnHasZero[$j] = false;
            }


            $sumColumn[$j] += $arr[$i][$j];


            $columnHasZero[$j] = $columnHasZero[$j] || $arr[$i][$j] === 0;
        }
    }
    $result = [];
    for ($i = 0; $i < $iMax; $i++) {

        for ($j = 0; $j < $jMax; $j++) {
            if ($columnHasZero[$j]) {
                continue;
            }
            $result[$i][$j] = $arr[$i][$j];
            if ($j === $jMax - 1) {
                $result[$i] = array_values($result[$i]);
            }
        }
    }
    return array_values($result);
}


/*
 Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
*/


function getValueArrayComplexity($arr)
{

    foreach ($arr as $val) {
        if (is_array($val)) {
            getValueArrayComplexity($val);
        }

        if (is_int($val)) {
            echo $val . ' ';
        }
    }

}
