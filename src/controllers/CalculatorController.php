<?php

class CalculatorController extends Controller {
    
    function __construct() {
        parent::__construct();
        echo "We are in calculator <br />";
    }
    
    function actionAdd(){
        echo "We are in Add action <br />";
        require "models/Calculator.php";
        $model = new Calculator();
        
    }
}
