<?php

class IndexController extends Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function actionIndex(){
        $this->view->render('index/index');
    }
}
