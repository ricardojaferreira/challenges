<?php

/**
 * Some of the logic in this file should be passed to a class and much more abstractions built
 * but for this proof of concept this is enough.
 */

    include_once('Dao_EndUser_Table.php');
    include_once('Dao_Promotions_Table.php');

    $users = Dao_EndUser_Table::getInstance()->getAllUsers();
    $totalUsers = count($users);
    $promotions = Dao_Promotions_Table::getInstance()->getAllPromotions();
    $totalPromotions = count($promotions);
    $matchUserWithPromotion = [];

    foreach ($promotions as $entry => $promotion) {
        if ($totalPromotions === 1) {
           matchUsersWithPromotion($users, $promotion[Db_Promotions_Table::COLUMN_NAME], $matchUserWithPromotion);
           break;
        }
        $splitPercent = $promotion[Db_Promotions_Table::COLUMN_SPLIT_PERCENT] / 100;
        $usersForCampaign = round($totalUsers * $splitPercent, PHP_ROUND_HALF_UP);
        while ($usersForCampaign > 0) {
            $selectedUser = getUser($users, $totalUsers);
            $matchUserWithPromotion[$users[$selectedUser][Db_EndUser_Table::COLUMN_IN]] = $promotion[Db_Promotions_Table::COLUMN_NAME];
            unset($users[$selectedUser]);
            $usersForCampaign--;
        }
        $totalPromotions--;
    }

    echo "Printing distribution: Array(user_id => campaign_name)" . PHP_EOL;
    echo "Note: The database has 40 users" . PHP_EOL;
    print_r($matchUserWithPromotion);


    function matchUsersWithPromotion(array $arrayOfUsers, String $promotionName, array &$arrayOfMatches) {
        foreach ($arrayOfUsers as $entry => $user) {
            $arrayOfMatches[$user[Db_EndUser_Table::COLUMN_IN]] = $promotionName;
        }
    }

    function getUser(array $users, int $totalUsers) :int
    {
        $selectedUser = rand(0, $totalUsers);
        $index = $selectedUser;
        for (;$index<=$totalUsers;$index++) {
            if (isset($users[$index])) break;
            if ($index === $totalUsers) {
                $index = 0;
                continue;
            }
        }
        return $index;

    }
