<?php 
    //Get Username
    $user = "Guest";
    session_start();
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    //Fetch Posts
    require_once('../db.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);

    //Fetch Comments
    $sql = "SELECT * FROM comment WHERE post_id = $id";
    $result1 = $conn->query($sql);
    $comment_length = $result1->num_rows;

    //Get Likes
    $sql = "SELECT * FROM likes WHERE post_id = $id";
    $result2 = $conn->query($sql);
    $likes = [];
    $like_src = "./like.png";
    while($row = $result2->fetch_assoc()) {
        array_push($likes, $row['username']);
    }
    if(in_array($user, $likes)) {
        $like_src = "./like2.png";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Post</title>
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
        <link rel="stylesheet" href="./styles/style.css">
    </head>
    <body>
        <input type="hidden" id="username" value="<?php echo $user ?>">
        <input type="hidden" id="post_id" value="<?php echo $id; ?>">
        <div class="navbar">
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
        <div class="post_content">
            <?php while($row = $result->fetch_assoc()): ?>
                    <br>
                <h1 style="margin-bottom: 5px;"><?php echo $row['title'] ?></h1>
                <p style="margin-bottom: 5px;"><?php echo $row['content'] ?></p>
                <br>
                <center>
                        <img src="<?php echo $row['url'] ?>" class="photo" id="thumb" />
                </center>
          <div class="bar">
            <?php if($user != "Guest"): ?>
                <div class="bar" style="flex: 1;">
                    <label id="likes" style="font-size: 24px; margin-right: 5px;"><?php echo $row['likes']; ?></label>
                    <img src="<?php echo $like_src; ?>" id="like_btn" style="cursor: pointer; width: 25px; height: 25px;" />
                </div>
                <div class="bar" style="padding-top: 0px;">
                    <label id="comments_label" style="font-size: 24px; margin-right: 5px;"><?php echo $comment_length; ?></label>
                    <img src="./comment.png" id="comment_btn" style="cursor: pointer; width: 25px; height: 25px; padding-top: 5px;" />
                </div>
            </div>
            </div>
            <form method="POST" action="http://localhost/projekti_cp/api/addComment.php">
                <input type="text" id="comment" placeholder="Comment:" name="content">
                <input type="hidden" name="username" value="<?php echo $user; ?>">
                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
            </form>
        <?php endif; ?>
        <?php endwhile; ?>
        <div id="comments">
            <?php while($row = $result1->fetch_assoc()): ?>
                <div class="comment"><?php echo $row['username'] . ': ' . $row['content'] ?></div>
            <?php endwhile; ?> 
        </div>
        <br><br><br><br>
        <script src="app.js"></script>
    </body>
</html>