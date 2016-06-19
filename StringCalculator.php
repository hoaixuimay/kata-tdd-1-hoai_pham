<?php

/**
 * Description of StringCalculator
 *
 * @author Hoai
 */
class StringCalculator {
    
    /*
     * Maximum number allow
     */
    const MAXIMUM_NUMBER = 1000;
    
    public function Add($numbers){
        // empty case
        if(empty($numbers)){
            return 0;
        }
        // other cases
        $definedSeparator = preg_match("/^\/\//", $numbers);
        $separator = '\n,';
        if($definedSeparator){
            $separator .= substr($numbers, 2,1);
            $numbers = substr($numbers, 4);
        }
        $numberArr = preg_split("/[$separator]/",$numbers);
        $invalidNumbers = $this->getInvalidNumbers($numberArr);
        if(!empty($invalidNumbers)){
            throw new InvalidArgumentException("Negatives not allowed. Invalid values: " . implode(",",$invalidNumbers), 100);
        }
        $result = 0;
        foreach($numberArr as $number){
            if($number > self::MAXIMUM_NUMBER){
                continue;
            }
            $result += $number;
        }
        return $result;
    }
    
    private function getInvalidNumbers($numbers){
        $invalidNumbers = array();
        foreach($numbers as $number){
            if(!is_numeric($number) || $number < 0){
                array_push($invalidNumbers,$number);
            }
        }
        return $invalidNumbers;
    }
}


