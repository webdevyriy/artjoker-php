/*
 * Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.
 * */

function dec2Bin(dec)
{
    if(dec >= 0) {
        return dec.toString(2);
    }
    else {
        return (~dec).toString(2);
    }
}


/*
 * Написать функцию, которая выполняет преобразование наоборот.
 *
 * из двоичной системы счисления и преобразовывает в десятичную
 *
 * */


function binToDec(num) {
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

function customPow(number, exponentiation)
{
    let result = number;
    for (let i = 0; i < exponentiation - 1; i++) {
        result = result * number;
    }
    return result;
}

/* рекурсивно*/

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
    startIp =  startIp.replace(".", "", startIp);
    endIp =  endIp.replace(".", "", endIp);
    targetIp = targetIp.replace(".", "", targetIp);

    startIp = Number(startIp);
    endIp = Number(endIp)
    targetIp = Number(targetIp);

    if (startIp != 0 && endIp != 0 && targetIp != 0) {
        if (startIp <= targetIp && targetIp <= endIp) {
            return true;
        } else {
            return false;
        }
    }
}

console.log(calculatingIp('37.229.184.192'))




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


function calculatePercentageArray(arr)
{
   let plus = 0;
    let  minus = 0;
    let zero = 0;
    let  normal = 0;
    let  allElement = arr.length;

        for (let i = 0; $i < allElement; $i++) {

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

function sortArrayAscending(arr)
{

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






