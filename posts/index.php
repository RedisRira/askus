<?php
    $user = "Guest";
    session_start();
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    //Fetch Posts
    require_once('../db.php');
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Posts</title>
        <link rel="stylesheet" href="./styles/index.css">
    </head>
    <body>
        <div id="top_top"></div>
        <div class="first">
            <button id="posts_btn">Posts</button>
        </div>
        <div class="second" style="opacity: 0; min-height: 110vh">
            <div class="navbar" id="navbar">
                <div class="left">
                    <a href="http://localhost/projekti_cp/">Home</a>
                    <a href="http://localhost/projekti_cp/posts">Posts</a>
                    <a href="/news/">News</a>
                    <a href="/contact_us/">Contact Us</a>
                </div>
                <?php if($user == "Guest"): ?>
                    <a href="http://localhost/projekti_cp/login/login.php" style="float: right">Log In</a>
                <?php else: ?>
                    <a href="http://localhost/projekti_cp/api/logout.php" style="float: right">Log Out</a>
                <?php endif; ?>
            </div>
            <div class="side_bar"> 
                <img src="user.png" alt="user" />
                <div class="information">
                    <h1 id="h_1">Username: <?php echo $user; ?></h1>
                </div>
            </div>
            <div class="posts">
                <br>
                <div class="posts_list">
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="post">
                            <a href="http://localhost/projekti_cp/posts/post.php?id=<?php echo $row['id']; ?>"><h1><?php echo $row['title']; ?></h1></a>
                            <div class="centered">
                                <img src="<?php echo $row['url']; ?>" alt="">
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <a href="#top_top" id="top"><img src="./btn.png" style="left: 10px; height: 25px; width: 25px" /></a>
        <script>
            const btn = document.getElementById("top");

            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                btn.style.opacity = 1;
            } else {
                btn.style.opacity = 0;
            }
            }

            setTimeout(() => document.querySelector("body").style.overflow = "auto", 1000);
        </script>
    </body>
</html>