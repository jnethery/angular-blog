<?php

class Model 
{
    public function __construct()
    {
        include('core/Database.php');
        $this->db = new Database();
    }
}

?>
