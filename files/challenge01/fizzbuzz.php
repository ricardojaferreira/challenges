<?php
    for ($i=0;$i<=100;$i++) {
        if ($i%3==0) {
            if($i%5 == 0) {
                echo "FizzBuzz\n";
                continue;
            }
            echo "Fizz\n";
            continue;
        }
        if ($i % 5 == 0) {
            echo "Buzz\n";
            continue;
        }
        echo $i . "\n";
    }
?>

