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
        $separator = '[\n,]';
        if(preg_match("/^\/\//", $numbers)){ // defined delimiter
            if(preg_match("/^\/\/(\[.+\])+\n(.+)/", $numbers, $matches)){
                // get delimiters
                $delimiters = preg_split("/[\[\]]/", $matches[1]); 
                // remove empty values
                $delimiters = array_filter($delimiters); 
                // replace delimiters by "," to avoid special characters int pattern matching
                $numbers = str_replace($delimiters, ",", $matches[2]);
            } else {
                $delimiter = substr($numbers, 2,1);
                $numbers = substr($numbers, 4);
                $numbers = str_replace("$delimiter", ",", $numbers);
            }
        }
        
        $numberArr = preg_split("/$separator/",$numbers);
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


