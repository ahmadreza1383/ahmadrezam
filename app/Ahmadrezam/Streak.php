<?php

namespace App\Ahmadrezam;

class Streak
{
    private $year;

    public function __construct($year = null)
    {
        $this->year = (is_null($year)) ? date('Y') : $year;
    }

    public function yearValidate($dateMount, $options)
    {
        foreach($options as $key => $option) {
            $dateMount[$key] = $this->validate($option, $dateMount[$key]);
        }

        return $dateMount;
    }

    public function mountValidate($dateMount, $option)
    {
        $dateMount =  $this->validate($option, $dateMount);

        return $dateMount;
    }

    public function offest($count, &$dateMount)
    {
        $len = count($dateMount);
        $dateMount = array_slice($dateMount, $count, $len);
    }

    public function head($count, &$dateMount)
    {
        $dateMount = array_slice($dateMount, 0, $count);
    }

    public function tail($count, &$dateMount)
    {
        $len = count($dateMount);
        $dateMount = array_slice($dateMount, $len-$count, $len);
    }

    public function validate($options, $mount)
    {
        if(isset($options['offest'])){
            $this->offest($options['offest'], $mount);
        }

        if(isset($options['head'])){
            $this->head($options['head'], $mount);
        }

        if(isset($options['tail'])){
            $this->tail($options['tail'], $mount);
        }

        return $mount;
    }












    // public function deny(array $days, $dateMount)
    // {
    //     $deny = array_diff($dateMount, $nums);

    //     return $deny;
    // }

    // public function allow(array $days, $dateMount)
    // {
    //     $deny = array_diff($dateMount, $nums);

    //     return $deny;
    // }


































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
            $getCalDaysInMount = $this->getCalDaysInMount($i);

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
            // if($flatten === true){
                // $listOfDaysPerYear = array_merge($listOfDaysPerYear, $listOfDaysPerMount);
            // } else {
                $listOfDaysPerYear[$key] = $listOfDaysPerMount;
            // }
        }

        $listOfDaysPerYear = $this->yearValidate($listOfDaysPerYear, [
            //February
            2 => [
                'offest' => 6,
                'head' => 5,
            ],
            6 => [
                'head' => 5,
            ],
            // August
            12 => [
                'tail' => 10,
            ],
        ]);

        return $listOfDaysPerYear;
    }

    public function generateDateForYear()
    {
        $listOfDaysPerYear = [];
        $getCalDaysInMounts = $this->getCalDaysInMounts(); // Get number days per mounts
        //
        foreach($getCalDaysInMounts as $key => $calDaysInMount){
            $listOfDaysPerMount = $this->listOfDaysPerMount($key);
            $listOfDaysPerYear[$key] = $listOfDaysPerMount;
        }

        return $listOfDaysPerYear;
    }
}
