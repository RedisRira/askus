<?php
    if(isset($_GET['post_id']) && isset($_GET['username'])) {
        require_once("../db.php");

        //Var
        $id = $_GET['post_id'];
        $user = $_GET['username'];

        //Add To Posts
        $sql = "UPDATE posts SET likes=likes+1 WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            //Add TO Likes
            $sql = "INSERT INTO likes(post_id, username) VALUES($id, '$user')";
            if ($conn->query($sql) === TRUE) {
                echo 'Added';
            }
        } else {
            echo "Error: ".$conn->error;
        }
    }
?>