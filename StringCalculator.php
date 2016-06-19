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
        $numberArr = preg_split("/[\n,]/",$numbers);
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


