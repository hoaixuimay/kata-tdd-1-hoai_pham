<?php

class CalculatorController extends Controller {
    
    function __construct() {
        parent::__construct(); 
    }
    
    function actionIndex(){
        $inputString = trim(!empty($_POST['inputString'])?$_POST['inputString']:'');
        $this->view->inputString = $inputString;
        $inputString = str_replace("\r\n","\n",$inputString);
        $this->view->result = $this->model->Add($inputString);
        $this->view->render('string-calculator/index');
    }
}
