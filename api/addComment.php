<?php
    if(isset($_POST['content']) && isset($_POST['post_id']) && isset($_POST['username'])) {
        require_once("../db.php");
        $content = $_POST['content'];
        $post_id = $_POST['post_id'];
        $username = $_POST['username'];

        $sql = "INSERT INTO comment(content, post_id, username) VALUES('$content', $post_id, '$username')";
        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/projekti_cp/posts/post.php?id=$post_id");
        }
    }
?>