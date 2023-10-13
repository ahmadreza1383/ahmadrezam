<?php

namespace App\Ahmadrezam;

use App\Models\Streak as ModelsStreak;
use Closure;
use DateTime;

class Streak
{
    public function mounts()
    {
        return $monthNames = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
            'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
            'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12,
        ];
    }

    public function getYear($year)
    {
        return (is_null($year)) ? date('Y') : $year;
    }

    public function getCalDaysInMount($year = null, $mount)
    {
        $year = $this->getYear($year);

        return cal_days_in_month(CAL_GREGORIAN, $mount, $year);
    }

    public function getCalDaysInMounts($year = null)
    {
        $getCalDaysInMounts = [];
        for($i = 1; $i <= 12; $i++){
            $getCalDaysInMount = $this->getCalDaysInMount(null, $i);

            $getCalDaysInMounts[$i] = $getCalDaysInMount;
        }

        return $getCalDaysInMounts;
    }

    public function listOfDaysPerMount($year, $mount)
    {
        $getYear = $this->getYear($year);
        $listOfDaysPerMount = [];
        $getCalDaysInMount = $this->getCalDaysInMount($year, $mount); // Get number days per mounts

        for ($i=1; $i <= $getCalDaysInMount ; $i++) {
            $listOfDaysPerMount[$i] = "$getYear/$mount/$i";
        }

        return $listOfDaysPerMount;
    }

    public function listOfDaysPerYear($year = null, $flatten = false)
    {
        $getYear = $this->getYear($year);
        $listOfDaysPerYear = [];
        $getCalDaysInMounts = $this->getCalDaysInMounts($year); // Get number days per mounts
        //
        foreach($getCalDaysInMounts as $key => $calDaysInMount){
            // Flatten
            if($flatten == true){
                $listOfDaysPerMount = [];

                for ($i=1; $i <= $calDaysInMount ; $i++) {
                    $listOfDaysPerMount[$i] = "$getYear/$key/$i";
                }

                $listOfDaysPerYear = array_merge($listOfDaysPerYear, $listOfDaysPerMount);
            } else {
                for ($i=1; $i <= $calDaysInMount ; $i++) {
                    $listOfDaysPerYear[$key][$i] = "$getYear/$key/$i";
                }
            }
        }

        return $listOfDaysPerYear;
    }
}
