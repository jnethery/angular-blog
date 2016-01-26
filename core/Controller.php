<?php

class Controller 
{   
    public function __construct()
    {
        include('core/Model.php');
    }
    
    public function index()
    {
        include('views/index.html');
    }   
}

?>
