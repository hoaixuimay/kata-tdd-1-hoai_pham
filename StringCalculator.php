<?php

/**
 * Description of StringCalculator
 *
 * @author Hoai
 */
class StringCalculator {
    
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
        $result = 0;
        foreach($numberArr as $number){
            // check numeric string
            if(!is_numeric($number)){
                throw new InvalidArgumentException("Invalid number: $number", 100);
            }
            $result += $number;
        }
        return $result;
    }
}


