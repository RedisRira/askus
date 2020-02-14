<?php
    require_once("../db.php");

    if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        $is_valid = true;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['user'] == $user) {
                    $is_valid = false;
                }
            }
        }

        if($is_valid) {
            $sql = "INSERT INTO users (user, email, password)
            VALUES ('$user', '$email', '$pass')";
    
            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: http://localhost/projekti_cp/posts");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo 'User already exist!';
        }

        $conn->close();
    }
?>