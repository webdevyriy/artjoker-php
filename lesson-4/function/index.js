'use strict'

/*
 * Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.
 * */


function customDecbin(dec) {
    return (dec >>> 0).toString(2);
}


/*
 * Написать функцию, которая выполняет преобразование наоборот.
 *
 * из двоичной системы счисления и преобразовывает в десятичную
 *
 * */


function customBindec(num) {
    let dec = 0;
    for (let i = 0; i < num.length; i++) {
        dec *= 2;
        dec += +num[i];
    }
    return dec;
}


/* Найти сумму всех первых N чисел фибоначи */
function sumFibonacci(n) {
    let a = 1;
    let b = 1;
    for (let i = 3; i <= n; i++) {
        let c = a + b;
        a = b;
        b = c;
    }
    return b;
}

/* рекурсивно*/

function sumFibonacciRecursively(n) {
    return n <= 1 ? n : sumFibonacciRecursively(n - 1) + sumFibonacciRecursively(n - 2);
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

function customPow(number, exponentiation)
{
    let result = number;
    for (let i = 0; i < exponentiation - 1; i++) {
        result = result * number;
    }

    return result;
}



function customPowRecursively(number, exponentiation)
{
    if (exponentiation !== 0) {
        return number * customPowRecursively(number, exponentiation - 1);
    }

    return 1;
}




/*
 Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.
 * */

function calculatingIp(startIp, endIp, targetIp)
{
    let startIpChek = startIp.replace(".", "", startIp);
    let endIpChek  = endIp.replace(".", "", endIp);
    let targetIpChek  = targetIp.replace(".", "", targetIp);

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


function isPrime(number)
{
    for (let i = 2; i < number; i++) {
        if (number % i === 0) {
            return false;
        }
    }
    return number > 1;
}
let arr5 = [2, 5, 3, -59, 2.75];

function calculatePercentageArray(arr) {
    let plus = 0;
    let minus = 0;
    let zero = 0;
    let normal = 0;
    let allElement = arr.length;

    for (let i = 0; i < allElement; i++) {

        if (arr[i] > 0) {
            plus++;
        }

        if (arr[i] < 0) {
            minus++;
        }
        if (arr[i] == 0) {
            zero++;
        }
        if (isPrime(arr[i])) {
            normal++;
        }

    }

    let resultObject = {
        'процент положительных чисел': 100 * plus / allElement,
        'процент отрицательных чисел': 100 * minus / allElement,
        'процент нулевых чисел': 100 * zero / allElement,
        'процент простых чисел': 100 * normal / allElement,
    };

    return resultObject;
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

function sortArrayAscendingRecursively (arr){
    if (arr.length < 2){
        return arr
    }

    const baseValue = arr[arr.length - 1];
    const left = [],
        right = []

    for (let i = 0; i < arr.length - 1; i++) {
        if (arr[i] < baseValue ) {
            left.push(arr[i])
        } else {
            right.push(arr[i])
        }
    }

    return [...sortArrayAscendingRecursively(left), baseValue, ...sortArrayAscendingRecursively(right)]
}


/* Отсортировать элементы по убыванию*/

function sortArrayDescending(arr)
{
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

function sortArrayDescendingRecursively (arr){
    if (arr.length < 2){
        return arr
    }

    const baseValue = arr[arr.length - 1];
    const left = [],
        right = []

    for (let i = 0; i < arr.length - 1; i++) {
        if (arr[i] < baseValue ) {
            left.push(arr[i])
        } else {
            right.push(arr[i])
        }
    }

    let res = [...sortArrayDescendingRecursively(left), baseValue, ...sortArrayDescendingRecursively(right)];

    return res.reverse();
}


/* Для двумерных массивов Транспонировать матрицу */

let arr1 = [
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
];

function transposeMatrix(arr) {
    let m = arr.length, n = arr[0].length, result = [];
    for (let i = 0; i < n; i++) {
        result[i] = [];
        for (let j = 0; j < m; j++) result[i][j] = arr[j][i];
    }
    return result;
}


/*
* Сложить две матрицы
* */


let a1 = [
    [1, 2, 5],
    [4, 5, 6]
];

let  a2 = [
    [3, 2, 6],
    [1, 1, 6]
];

function sumMatrix(matrixOne, matrixTwo)
{
    let m = matrixOne.length;
    let n = matrixOne[0].length;
    let result = [];
    for (let i = 0; i < m; i++) {
        result[i] = [];
        for (let j = 0; j < n; j++) {
            result[i][j] = matrixOne[i][j] + matrixTwo[i][j];
        }

    }
    return result;
}

/*
Удалить строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент
   */

function array_key_exists (key, search) {
    if (!search || (search.constructor !== Array && search.constructor !== Object)) {
        return false
    }
    return key in search
}

function array_values (input) {
    const tmpArr = []
    let key = ''
    for (key in input) {
        tmpArr[tmpArr.length] = input[key]
    }
    return tmpArr
}


let arr6_3 = [
    [16, 89, 0, -59, 5],
    [19, 59, 10, -9, 95],
    [19, 59, 10, -9, 95],
];

function positiveMatrixRow(arr)
{
    let sumRow = [];

    let rowHasZero = [];

    let iMax = arr.length;

    for (let i = 0, iMax = arr.length; i < iMax; i++) {
        for (let j = 0, jMax = arr[i].length; j < jMax; j++) {
            if (!array_key_exists(i, sumRow)) {
                sumRow[i] = 0;
            }

            if (!array_key_exists(i, rowHasZero)) {
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
    return array_values(result);
}


/*
 * Удалить те столбцы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
 * */


function positiveMatrixColumn(arr) {
    let res = [];

    arr.forEach(function (item) {
        res.push(item.filter(Number))
    });
    return res;
}



/*
 Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
*/


let arr3 = [
    [
        ['a', 'b'],
        ['c', 'd'],
    ],
    [
        ['e', 'f'],
        ['g', 'h'],
    ],
    [
        ['i', 'j'],
        ['k', 'l'],
    ],
];

function getValueArrayComplexity(...arr)
{
    let result = [];

    for(let i = 0; i < arr.length; i++){
        let currentItem = arr[i];
        if(Array.isArray(currentItem)){
            result.push(...getValueArrayComplexity(...currentItem))
        }else {
            result.push(currentItem);
        }
    }
    return result;

}

console.log(getValueArrayComplexity(arr3))