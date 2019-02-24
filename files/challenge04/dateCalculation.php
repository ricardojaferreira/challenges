<?php
    const WEDNESDAY = 3;
    const SATURDAY = 6;
    const DRAW_HOUR = 20;

    $howManyDays=-99;
    $date = empty($argv[1]) ? date('Y-m-d') : $argv[1];
    $time = empty($argv[2]) ? date('H:i') : $argv[2];
    $dateToCompare = date('Y-m-d H:i', strtotime($date . $time));

    if($dateToCompare < date('Y-m-d H:i')) {
        $howManyDays = numberOfDaysToNextDraw();
        $dateToCompare = date('Y-m-d H:i');
    } else {
        $howManyDays = numberOfDaysToNextDraw(date('w-H', strtotime($dateToCompare)));
    }

    echo "Next draw will be on " . date('Y-m-d', strtotime($dateToCompare . '+' . $howManyDays . 'days')) . "\n";

    function numberOfDaysToNextDraw(string $weekDayAndTimeStr=null) :int
    {
        $weekDayAndTime = $weekDayAndTimeStr ?? date('w-H');
        $weekDayAndTimeArray = explode('-',$weekDayAndTime);

        if (checkDrawForWednesday((int) $weekDayAndTimeArray[0], (int) $weekDayAndTimeArray[1])) {
            return WEDNESDAY - $weekDayAndTimeArray[0];
        }

        if (checkDrawForSaturday($weekDayAndTimeArray[0], $weekDayAndTimeArray[1])) {
            return SATURDAY - $weekDayAndTimeArray[0];
        }

        if((int) $weekDayAndTimeArray[0] == SATURDAY) {
            return 4;
        }

        return -99;
    }

    function checkDrawForWednesday(int $weekDay, int $Hour) :bool
    {
        $days = WEDNESDAY - $weekDay;

        if ($days > 0)
            return true;

        if ($days == 0 && $Hour < DRAW_HOUR)
            return true;

        return false;
    }


    function checkDrawForSaturday(int $weekDay, int $Hour) :bool
    {
        $days = SATURDAY - $weekDay;

        if ($days > 0)
            return true;

        if ($days == 0 && $Hour < DRAW_HOUR)
            return true;

        return false;
    }

