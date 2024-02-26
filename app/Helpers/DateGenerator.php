<?php

namespace App\Helpers;

class DateGenerator
{
    /**
     * Generate an array of dates starting from the given last date moving forward by the specified number of days.
     *
     * @param  string  $lastDate  The last date in the format 'YYYY-MM-DD'.
     * @param  int  $numOfDays  The number of days to move forward.
     * @return array An array of dates starting from the last date and moving forward by the specified number of days.
     */
    public static function generateDates(string $lastDate, int $numOfDays): array
    {
        $dates = [];
        for ($i = 1; $i <= $numOfDays; $i++) {
            $dates[] = date('Y-m-d', strtotime($lastDate." +$i days"));
        }

        return $dates;
    }
}
