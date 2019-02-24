<?php

    /*
     * Some strategies can be used to find the missing element, since all the
     * elements are different we could just order the array and find the one missing.
     * Another alternative is to sum all the numbers and compare with the total amount
     * expected (this is a range of values without duplicates)
     * To make the solution compatible with any kind of array (with duplicates and
     * numbers not in a range) we could make a copy of the array before removing the
     * element and then use a divide and conquer algorithm to check which element 
     * is missing.
     * Since this problem is dealing with a range of values I will go with the first
     * strategy just to avoid using a bazooca to kill a fly.
     * */

    $originalArray = range(1,500);
    shuffle($originalArray);

    unset($originalArray[rand(0,499)]);

    asort($originalArray);
    
    $i = 1;    
    foreach($originalArray as $index => $value) {
        if($i != $value) {
            echo 'Missing Value is: ' . $value;
            break;
        }
        $i++;
    }
?>

