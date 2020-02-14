<?php
    session_start();
    $_SESSION["user"] = "Guest";
    session_destroy();
    header("Location: http://localhost/projekti_cp/posts");
?>