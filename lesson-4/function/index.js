'use strict'

/*
 * Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.
 * */


function customDecbin(number)
{
    let result = '';

    while (number > 0) {
        result = number % 2 + result;
        number = Math.floor(number / 2);
    }
    return result;
}

/*
 * Написать функцию, которая выполняет преобразование наоборот.
 *
 * из двоичной системы счисления и преобразовывает в десятичную
 *
 * */

function customBindec(number)
{
    let number_len = number.length;
    let result = '';

    for (let i = 0; i < number_len; i++) {
        result = Math.floor(result) + number[number_len - i - 1] * 2 ** i;
    }
    return result;
}


/* Найти сумму всех первых N чисел фибоначи */
function sumFibonacci(number) {
    let result = [0, 1];

    for (let i = 2; i <= number; i++) {
        let prevNumOne = result[i - 1];
        let prevNumTwo = result[i - 2];
        result.push(prevNumOne + prevNumTwo);
    }

    return result[number];
}

/* рекурсивно*/

function sumFibonacciRecursively(number) {
    return number <= 1 ? number : sumFibonacciRecursively(number - 1) + sumFibonacciRecursively(number - 2);
}


/*Написать функцию, возведения числа N в степень M*/

function customPow(number, exponentiation) {
    let result = number;
    for (let i = 0; i < exponentiation - 1; i++) {
        result = result * number;
    }
    return result;
}

/* рекурсивно*/

function customPowRecursively(number, exponentiation) {
    if (exponentiation !== 0) {
        return number * customPowRecursively(number, exponentiation - 1);
    }

    return 1;
}

/*Написать функцию, возведения числа N в степень M*/

function customPow(number, exponentiation) {
    let result = number;
    for (let i = 0; i < exponentiation - 1; i++) {
        result = result * number;
    }

    return result;
}


function customPowRecursively(number, exponentiation) {
    if (exponentiation !== 0) {
        return number * customPowRecursively(number, exponentiation - 1);
    }

    return 1;
}


/*
 Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.
 * */

function calculatingIp(startIp, endIp, targetIp) {
    let startIpChek = startIp.replace(".", "", startIp);
    let endIpChek = endIp.replace(".", "", endIp);
    let targetIpChek = targetIp.replace(".", "", targetIp);

    startIpChek = Number(startIpChek);
    endIpChek = Number(endIpChek);
    targetIpChek = Number(targetIpChek);

    if (startIpChek != 0 && endIpChek != 0 && targetIpChek != 0) {
        if (startIpChek <= targetIpChek && targetIpChek <= endIpChek) {
            return 1;
        } else {
            return 0;
        }
    }
}

/* Подсчитать процентное соотношение
    Положительных/отрицательных/нулевых/простых чисел
 */


function isPrime(number) {
    for (let i = 2; i < number; i++) {
        if (number % i === 0) {
            return false;
        }
    }
    return number > 1;
}


function calculatePercentageArrayPlus(arr) {
    let plus = 0;
    let allElement = arr.length;

    for (let i = 0; i < allElement; i++) {
        if (arr[i] > 0) {
            plus++;
        }
    }
    return 100 * plus / allElement;
}

function calculatePercentageArrayMinus(arr) {
    let minus = 0;
    let allElement = arr.length;
    for (let i = 0; i < allElement; i++) {
        if (arr[i] < 0) {
            minus++;
        }
    }

    return 100 * minus / allElement;
}

function calculatePercentageArrayNormal(arr) {
    let normal = 0;
    let allElement = arr.length;

    for (let i = 0; i < allElement; i++) {
        if (isPrime(arr[i])) {
            normal++;
        }
    }
    return 100 * normal / allElement;
}


function calculatePercentageArrayZero(arr) {
    let zero = 0;
    let allElement = arr.length;
    for (let i = 0; i < allElement; i++) {
        if (arr[i] == 0) {
            zero++;
        }
    }
    return 100 * zero / allElement;
}

/*
 * Отсортировать элементы по возрастанию
 * */

function sortArrayAscending(arr) {

    let result = arr;

    for (let i = 0; i < result.length; i++) {
        for (let j = 0; j < result.length - 1 - i; j++) {
            if (result[j] > result[j + 1]) {
                let two = result[j];
                result[j] = result[j + 1];
                result[j + 1] = two;
            }
        }
    }
    return result;
}

function mySort(arr) {
    if (arr.length < 2) {
        return arr;
    }
    let less = [];
    let baseValue = arr[arr.length - 1];
    let more = [];

    for(let i = 0; i < arr.length; i++){
        if(baseValue === arr[i]){
            continue
        }
        if(baseValue < arr[i]){
            less.push(arr[i])
        }else {
            more.push(arr[i]);
        }
    }

    return [
        ...mySort(less),
        baseValue,
        ...mySort(more)
    ]
}


/* Отсортировать элементы по убыванию*/

function sortArrayDescending(arr) {
    let result = arr;

    for (let i = 0; i < result.length; i++) {
        for (let j = 0; j < result.length - 1 - i; j++) {
            if (result[j] < result[j + 1]) {
                let two = result[j];
                result[j] = result[j + 1];
                result[j + 1] = two;
            }
        }
    }

    return result;
}

/*
 * Рекурсивно
 * */

function mySortDecrease(arr) {
    if (arr.length < 2) {
        return arr;
    }
    let less = [];
    let baseValue = arr[arr.length - 1];
    let more = [];

    for (let i = 0; i < arr.length; i++) {
        if (baseValue === arr[i]) {
            continue
        }
        if (baseValue < arr[i]) {
            less.push(arr[i])
        } else {
            more.push(arr[i]);
        }
    }
    let result = [
        ...mySortDecrease(less),
        baseValue,
        ...mySortDecrease(more)
    ];
    return result.reverse()
}




/* Для двумерных массивов Транспонировать матрицу */

function transposeMatrix(arr) {
    let matrix = arr.length;
    let matrixTwo = arr[0].length;
    let result = [];
    for (let i = 0; i < matrixTwo; i++) {
        result[i] = [];
        for (let j = 0; j < matrix; j++) {
            result[i][j] = arr[j][i];
        }
    }
    return result;
}


/*
* Сложить две матрицы
* */


function sumMatrix(matrixOne, matrixTwo) {
    let mantrixLeagth = matrixOne.length;
    let mantrixLeagthTwo = matrixOne[0].length;
    let result = [];
    for (let i = 0; i < mantrixLeagth; i++) {
        result[i] = [];
        for (let j = 0; j < mantrixLeagthTwo; j++) {
            result[i][j] = matrixOne[i][j] + matrixTwo[i][j];
        }

    }
    return result;
}

/*
Удалить строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент
   */


function positiveMatrixRow(arr) {
    let sumRow = [];

    let rowHasZero = [];


    for (let i = 0, iMax = arr.length; i < iMax; i++) {

        for (let j = 0, jMax = arr[i].length; j < jMax; j++) {
            if (!arr.indexOf(i, sumRow)) {
                sumRow[i] = 0;
            }

            if (!arr.indexOf(i, rowHasZero)) {
                rowHasZero[i] = false;
            }

            sumRow[i] += arr[i][j];

            rowHasZero[i] = rowHasZero[i] || arr[i][j] === 0;

        }
    }
    let result = [];

    for (let i = 0; i < arr.length; i++) {
        if (rowHasZero[i]) {
            continue;
        }
        result.push(arr[i])
    }

    return result;
}


/*
 * Удалить те столбцы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 * */


function positiveMatrixColumn(arr) {
    let result = [];

    arr.forEach(function (item) {
        result.push(item.filter(Number))
    });
    return result;
}

/*
 Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
*/


function getValueArrayComplexity(...arr) {
    let result = [];

    for (let i = 0; i < arr.length; i++) {
        let currentItem = arr[i];
        if (Array.isArray(currentItem)) {
            result.push(...getValueArrayComplexity(...currentItem))
        } else {
            result.push(currentItem);
        }
    }
    return result;
}
