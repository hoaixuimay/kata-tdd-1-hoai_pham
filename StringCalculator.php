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
        $numberArr = split(",",$numbers);
        $result = 0;
        foreach($numberArr as $number){
            $result += $number;
        }
        return $result;
    }
}


