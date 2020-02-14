<?php
    session_start();
    if(isset($_SESSION['user'])) {
        header("Location: http://localhost/projekti_cp/posts");
    }