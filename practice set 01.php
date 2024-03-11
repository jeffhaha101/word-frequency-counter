<?php

/**
 * calculates the total price of items in a shopping cart.
 *
 * @param array $items An array containing items with 'name' and 'price'.
 *
 * @return float the total price of all items.
 */
function calculateTotalPrice(array $items): float
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * modifies a string by removing spaces and converting it to lowercase.
 *
 * @param string $inputString the input string to be modified.
 *
 * @return string the modified string.
 */
function modifyString(string $inputString): string
{
    $modifiedString = str_replace(' ', '', $inputString);
    $modifiedString = strtolower($modifiedString);
    return $modifiedString;
}

/**
 * thecks if a number is even or odd.
 *
 * @param int $number the input number to be checked.
 *
 * @return string the result indicating whether the number is even or odd.
 */
function checkEvenOrOdd(int $number): string
{
    if ($number % 2 == 0) {
        return "The number {$number} is even.";
    } else {
        return "The number {$number} is odd.";
    }
}

// sample data for the shopping cart
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

// calculate and display the total price
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice;

// sample string for modification
$string = "This is a poorly written program with little structure and readability.";

// modify and display the string
$modifiedString = modifyString($string);
echo "\nModified string: " . $modifiedString;

// check and display if a number is even or odd
$number = 42;
$result = checkEvenOrOdd($number);
echo "\n{$result}";
