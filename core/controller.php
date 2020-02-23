<?php

class controller {
    public function loadView($viewname, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewname.'.php';
    }

    public function loadTemplate($viewname, $viewData = array()){
        require 'views/template.php';
    }

    public function loadViewInTemplate($viewname, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewname.'.php';
    }
}
?>