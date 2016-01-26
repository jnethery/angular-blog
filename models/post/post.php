<?php

class Post extends Model
{
    public function getPosts()
    {
        $sql = "SELECT * FROM post";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>
