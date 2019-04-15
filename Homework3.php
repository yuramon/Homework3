<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function numberMultiplier($myArray)
{
    $newArray = [];
    $count = count($myArray);
    for ($i = 0; $i < $count; $i++) {
        $ourNumber = $myArray[$i];
        for ($j = 0; $j < $ourNumber; $j++) {
            array_push($newArray, $ourNumber);
        }
    }
    return $newArray;
}

function maxNumbers($temperatures)
{
    $maxArray = [];
    for ($i = 0; $i < 3; $i++) {
        $maxNumber = max($temperatures);
        array_push($maxArray, $maxNumber);
        $key = array_search($maxNumber, $temperatures);
        unset($temperatures[$key]);

    }
    $maxNumber = implode(" ", $maxArray);
    return $maxNumber;
}

function minNumbers($temperatures)
{
    $minArray = [];
    for ($i = 0; $i < 3; $i++) {
        $minNumber = min($temperatures);
        array_push($minArray, $minNumber);
        $key = array_search($minNumber, $temperatures);
        unset($temperatures[$key]);

    }
    $minNumber = implode(" ", $minArray);
    return $minNumber;
}

function averageNumbers($temperatures )
{
    $averageArray = [];
    $length = count($temperatures) - 1;
    sort($temperatures);
    $averageNumber = $temperatures[($length/ 2) - 1];
    array_push($averageArray, $averageNumber);
    $averageNumber = $temperatures[($length) / 2];
    array_push($averageArray, $averageNumber);
    $averageNumber = $temperatures[($length / 2) + 1];
    array_push($averageArray, $averageNumber);
    $averageNumber = implode(" ", $averageArray);
    return $averageNumber;
}

function sortMultiArray($books)
{
    $sortBooks = [];
    foreach ($books as &$value) {
        $sortBooks[] = &$value['price'];
    }
    array_multisort($sortBooks, $books);
    return $books;
}

function booksFilter($books)
{
    $filteredMassive = [];
    foreach ($books as &$value) {
        if (isset($value['tags'])) {
            for ($i = 0; $i < count($value['tags']); $i++) {
                if (isset($value['tags'][$i])) {
                    if ($value['tags'][$i] === 'php') {
                        array_push($filteredMassive, $value);
                    }
                }
            }
        }
    }
    return $filteredMassive;
}

echo "<hr /> TASK 3.1 <hr /><br />";
$myArray = [1, 3, 2, 4];
print_r(numberMultiplier($myArray));

echo "<hr /> TASK 3.2 <hr /><br />";
$temperatures = array(33, 15, 17, 20, 23, 23, 28, 40, 21, 19, 31, 18, 30, 31, 28, 23, 19, 28, 27, 30, 39, 17, 17, 20, 19, 23, 28, 30, 34, 28);
echo "Max numbers : ".maxNumbers($temperatures)."<br />";
echo "Min numbers : ".minNumbers($temperatures)."<br />";
echo "Average numbers : ".averageNumbers($temperatures);

echo "<hr /> TASK 3.3 <hr /><br />";
$books = [
    [
        'name' => 'Learning php, mysql & JavaScript',
        'author' => 'Robin Nixon',
        'price' => 30,
        'tags' => ['php', 'javascript', 'mysql', 'python']
    ],
    [
        'name' => 'Php for the Web: Visual QuickStart Guide',
        'author' => 'Larry Ullman',
        'price' => 25,
        'tags' => ['php']
    ],
    [
        'name' => 'pHp and MySqL for Dynamic Web Sites',
        'author' => 'Larry Ullman',
        'price' => 14.39,
        'tags' => ['php', 'mysql']
    ],
    [
        'name' => 'Modern PhP: New Features and Good Practices',
        'author' => 'Josh Lockhart',
        'price' => 24,
        'tags' => ['php']
    ],
    [
        'name' => 'JavaScript and JQuery: Interactive Front-End Web Development',
        'author' => 'Jon Duckett',
        'price' => 20,
        'tags' => ['javascript', 'jquery']
    ],
    [
        'name' => 'Miss Peregrine\'s Home for Peculiar Children',
        'author' => 'Ransom Riggs',
        'price' => 8.18
    ]
];
$sortBooks = sortMultiArray($books);
foreach ($sortBooks as &$value) {
    echo "Price: ".$value['price'] . "<br />";
    echo "Book name: ".$value['name'] . "<br />";
    echo "Author name: ".$value['author']."<br />";
}
echo "<br />";

$filteredMassive=booksFilter($books);
foreach ($filteredMassive as &$value) {
    echo "Book name: ".$value['name'] . "<br />";
    echo "Author name: ".$value['author']."<br />";
}
?>
