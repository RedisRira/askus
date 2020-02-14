<?php
    require_once("../db.php");
    if(isset($_POST['user']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $is_valid = false;
            while($row = $result->fetch_assoc()) {
                if($row['user'] == $user && $row['password'] == $pass) {
                    $is_valid = true;
                }
            }
            if($is_valid) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: http://localhost/projekti_cp/posts");
            } else {
                echo "User is not valid! Please enter a valid user!";
            }
        } else {
            echo "User is not valid! Please enter a valid user!";
        }
        $conn->close();
    }
?>