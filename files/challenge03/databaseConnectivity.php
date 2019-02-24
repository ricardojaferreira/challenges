<?php
    include_once('Dao_ExadsTest_Table.php');

    echo "Getting values from exads_test...\n";
    print_r(Dao_ExadsTest_Table::getInstance()->getAllRecords());

    echo "Adding new record: Name: John, Age: 19, Job: Singer (Dangerous data)\n";

    $name = "<a href='someBadWebsite'>John</a>";
    $age = "19"; //This input can be filtered with the correct HTML input types
    $job = "Singer";

    //There is the possibility to use filter_var with FILTER_VALIDATE_REGEXP to validate the input against a regex
    //making the validation even more powerful

    $name = htmlspecialchars($name,ENT_QUOTES);
    $name = strip_tags($name);
    $age = htmlspecialchars($age,ENT_QUOTES);
    $age = strip_tags($age);
    $age = filter_var($age, FILTER_VALIDATE_INT);
    $job = htmlspecialchars($job,ENT_QUOTES);
    $job = strip_tags($job);

    $result = Dao_ExadsTest_Table::getInstance()->addRowToTable($name, $age, $job);

    if ($result) {
       print_r(Dao_ExadsTest_Table::getInstance()->getAllRecords());
    } else {
        echo "Record not saved.\n";
    }
