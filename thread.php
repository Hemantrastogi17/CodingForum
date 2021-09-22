<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>iForum</title>
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>

<body>
<?php include "partials/_dbconnect.php";?>

    <?php include "partials/_navbar.php";?>

    <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn , $sql );
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users123` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn , $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_email'];
        }
    ?>

    <?php
    $showAlert =  false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $comment = $_POST['comment']; 
            $comment = str_replace("<","&lt;", $comment); 
            $comment = str_replace(">","&gt;", $comment); 

            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn ,  $sql);
            $showAlert =  true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your comment has been added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    
    ?>



    <div class="container my-4">
        <div class="jumbotron">
            <h1><?php echo $title;?> </h1>
            <p class="lead"><?php echo $desc;?></p>

            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other. No Spam / Advertising / Self-promote
                in the forums.Do not post copyright-infringing material. Do not post “offensive” posts, links or images.
                Do not cross post questions. Do not PM users asking for help. all times.</p>
            <p>Posted by - <strong><?php echo $posted_by?></strong></p>
        </div>
    </div>

    <?php  
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo '
<div class="container my-2">

<h2>Post a Comment</h2>
<hr>
<form action="'.$_SERVER["REQUEST_URI"].'" method="post">

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Comment</label>
        <textarea class="form-control" id="comment" name="comment" placeholder="Type your comment here..."
            rows="3"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION["sno"].'" >
    </div>
    <button type="submit" class="btn btn-success">Post Comment</button>
    </form>
    </div>';
    }
    else{
    echo '<div class="container">
        <h2>Post a Comment</h2>
        <hr>
        <p class="lead">You are not logged in. Please login to be able to post comments.</p>
    </div>';
    }
    ?>


    <div class="container" id="ques">
        <h3><br>Discussions</h3>
        <hr>
        <?php
        $noResult = true;
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
        $result = mysqli_query($conn , $sql );
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_by =$row['comment_by'];
            $sql2 = "SELECT user_email FROM `users123` WHERE sno='$comment_by'";
            $result2 = mysqli_query($conn , $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $noResult = false;
            

        echo '<div class="media">
        <img src="assets/user_default.jpg" width="34px" class="align-self-start mr-3" alt="...">
            <div class="media-body">
                <p class = "font-weight-bold my-0"> '.$row2['user_email'].' </p>
                <p>'.$content.'</p>
            </div>
        </div>';
        }
        
        
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No comments found.</p>
              <p class="lead">Be the first person to comment</p>
            </div>
          </div>';
        }
        ?>
    </div>


    <?php include "partials/_footer.php";?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>