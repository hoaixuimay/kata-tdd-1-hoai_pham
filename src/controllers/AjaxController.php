<?php

class AjaxController extends Controller {
    
    function __construct() {
        parent::__construct(); 
    }
    
    function actionCalculate(){
        $post_json = file_get_contents('php://input');
        $post = json_decode($post_json, true);
        $inputString = trim(!empty($post['inputString'])?$post['inputString']:'');
        require('models/Calculator.php');
        $model = new Calculator();
        $result = $model->Add($inputString);
        echo json_encode($result);
    }
}
