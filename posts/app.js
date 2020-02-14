document.getElementById("like_btn").addEventListener("click", () => {
    const user = document.getElementById("username").value;
    const post_id = document.getElementById("post_id").value;
    if (document.getElementById("like_btn").src == "http://localhost/projekti_cp/posts/like2.png") {
        //Delete Like
        document.getElementById("like_btn").src = "http://localhost/projekti_cp/posts/like.png";
        fetch(`http://localhost/projekti_cp/api/deleteLike.php?post_id=${post_id}&username=${user}`)
        .then(res => res.text());
        document.getElementById("likes").innerHTML = parseInt(document.getElementById("likes").innerHTML) - 1;
    } else {
        //Add Like
        document.getElementById("like_btn").src = "http://localhost/projekti_cp/posts/like2.png";
        fetch(`http://localhost/projekti_cp/api/addLike.php?post_id=${post_id}&username=${user}`)
        .then(res => res.text());
        document.getElementById("likes").innerHTML = parseInt(document.getElementById("likes").innerHTML) + 1;
    }
});
