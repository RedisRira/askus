<?php
    require_once("check_session.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Postet</title>
        <style>
            * {
                margin: 0px;
                top: 0;
                left: 0;
                font-family: verdana;
            }

            .navbar {
                width: 100%;
                background: #ce8b54;
                display: flex;
                position: fixed;
            }

            .navbar a {
                margin: 0px;
                padding: 20px; 
                font-size: 20px;
                text-decoration: none;
                color: #fff;
                transition: 0.5s;
                font-size: 17px;
            }

            .navbar .left {
               padding-top: 20px;
               margin: 0px;
               flex: 1;
            }

            .left a {
                padding: 17px;
            }
        </style>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="first">
            <button id="posts_btn">Log In</button>
        </div>
        <div class="second">
            <div class="navbar">
                <div class="left">
                    <a href="http://localhost/projekti_cp/">Home</a>
                    <a href="http://localhost/projekti_cp/posts">Posts</a>
                    <a href="/news/">News</a>
                    <a href="/contact_us/">Contact Us</a>
                </div>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" style="float: right">Ask Us</a>
            </div>
            <!-- style="height: 60vh; display: flex; flex-direction: column; justify-content: center;" -->
            <div>
                <div class="login">
                    <div id="bg_side">
                        <h1 style="color: white; font-size: 40px; background-color: rgba(0, 0, 0, 0.8); padding: 20px; width: 200px; margin: auto; transition: 0.5s;">Login</h1>
                    </div>
                    <div>
                        <form class="general_form" method="POST" action="http://localhost/projekti_cp/api/login.php">
                            <label for="username">Username: </label>
                            <input type="text" name="user" id="username_input" class="form_input">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="password_input" class="form_input">
                            <input type="submit" value="Log In" class="submit_btn">
                            <a href="http://localhost/projekti_cp/login/createAccount.php" class="link">You don't have an account? Click here!</a>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>