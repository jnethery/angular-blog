<?php

class API extends Controller
{   
    public function getPosts()
    {
        header('Content-type: application/json');
        $post = App::loadClass('models/post/post.php');
        $posts = $post->getPosts();
        echo json_encode($posts);
    }
    
    public function test($arg1, $arg2)
    {
        print_r(array($arg1, $arg2));
        if ($arg1 == 1) {
            App::show404();
        }
    }
}

?>
