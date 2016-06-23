<!doctype html>
<html>
    <head>
        <title>TDD Taka test</title>
        <link rel="stylesheet" href="<?php echo ROOT_URL; ?>public/css/default.css"></link>
        <script type="text/javascript" src="<?php echo ROOT_URL; ?>public/js/jquery/jquery.js"></script>
        <script type="text/javascript">
            var ROOT_URL = "<?php echo ROOT_URL; ?>";
        </script>
        <script type="text/javascript" src="<?php echo ROOT_URL; ?>public/js/angular/angular.js"></script>
        <script type="text/javascript" src="<?php echo ROOT_URL; ?>public/js/app.js"></script>
    </head>
    <body ng-app="myApp">
        <div id="header">
            header <br />
            <a href="<?php echo ROOT_URL; ?>index">Index</a>
            <a href="<?php echo ROOT_URL; ?>calculator">Calculator</a>
        </div>
        <div id="content">
    