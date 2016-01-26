<?php

class Database {
        
    public function __construct()
    {
        $config = App::$config['database'];
        $db = new mysqli($config['server'], $config['username'], $config['password']);
        $db->select_db($config['database']);
        $this->db = $db;
    }
    
    public function query($sql)
    {
        $this->db->real_query($sql);
        $result = mysqli_use_result($this->db);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    public function __destruct()
    {
        $this->db->close();
    }
    
}

?>
