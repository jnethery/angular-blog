<?php

class Post extends Model
{
    public function getPosts()
    {
        $sql = "SELECT post.*, author.firstName AS authorFirst, author.lastName AS authorLast "
                . "FROM post "
                . "JOIN author "
                . "ON author.id = post.author_id";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function getPost($id)
    {
        $id = (int)$id;
        $sql = "SELECT post.*, author.firstName AS authorFirst, author.lastName AS authorLast "
                . "FROM post "
                . "JOIN author "
                . "ON author.id = post.author_id "
                . "WHERE post.id = $id";
        $result = $this->db->query($sql);
        return $result;
    }
}

?>
