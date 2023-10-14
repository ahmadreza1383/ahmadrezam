<?php

namespace App\Ahmadrezam;

class Streak
{
    private $year;

    public function __construct($year = null)
    {
        $this->year = (is_null($year)) ? date('Y') : $year;
    }

    private function getYear()
    {
        return $this->year;
    }

    public function getCalDaysInMount($mount)
    {
        $year = $this->getYear();

        return cal_days_in_month(CAL_GREGORIAN, $mount, $year);
    }

    public function getCalDaysInMounts()
    {
        $getCalDaysInMounts = [];
        for($i = 1; $i <= 12; $i++){
            $getCalDaysInMount = $this->getCalDaysInMount(null, $i);

            $getCalDaysInMounts[$i] = $getCalDaysInMount;
        }

        return $getCalDaysInMounts;
    }

    public function listOfDaysPerMount($mount, $options = [])
    {
        $i = 1;
        $getCalDaysInMount = $this->getCalDaysInMount($mount); // Get number days per mounts

        if(! empty($options['options']) && ! empty($options = $options['options'])){
            if(isset($options['max']) && is_numeric($options['max'])){
                $getCalDaysInMount = $options['max'];
            }

            if(isset($options['min']) && is_numeric($options['min'])){
                $i = $options['min'];
            }
        }

        $year = $this->getYear();
        $listOfDaysPerMount = [];
        for ($i; $i <= $getCalDaysInMount ; $i++) {
            $listOfDaysPerMount[$i] = "$year/$mount/$i";
        }

        return $listOfDaysPerMount;
    }

    public function listOfDaysPerYear($flatten = false)
    {
        $listOfDaysPerYear = [];
        $getCalDaysInMounts = $this->getCalDaysInMounts(); // Get number days per mounts
        //
        foreach($getCalDaysInMounts as $key => $calDaysInMount){
            $listOfDaysPerMount = $this->listOfDaysPerMount($key);

            // Flatten
            if($flatten === true){
                $listOfDaysPerYear = array_merge($listOfDaysPerYear, $listOfDaysPerMount);
            } else {
                $listOfDaysPerYear[$key] = $listOfDaysPerMount;
            }
        }

        return $listOfDaysPerYear;
    }
}
