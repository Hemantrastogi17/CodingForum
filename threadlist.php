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
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE categories_id = $id";
        $result = mysqli_query($conn , $sql );
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categories'];
            $catdesc = $row['categories_desc'];
        }
    ?>
    <?php
    $showAlert =  false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $th_title = $_POST['title'];
            $th_title = str_replace("<","&lt;", $th_title); 
            $th_title = str_replace(">","&gt;", $th_title); 

            $th_desc = $_POST['desc'];
            $th_desc = str_replace("<","&lt;", $th_desc); 
            $th_desc = str_replace(">","&gt;", $th_desc); 

            $sno = $_POST['sno'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `time`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp());";
            $result = mysqli_query($conn ,  $sql);
            $showAlert =  true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your question has been posted. Please wait for the community to respond! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1>Welcome to <?php echo $catname;?> forums</h1>
            <p class="lead"><?php echo $catdesc;?></p>

            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other. No Spam / Advertising / Self-promote
                in the forums.Do not post copyright-infringing material. Do not post “offensive” posts, links or images.
                Do not cross post questions. Do not PM users asking for help. all times.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <?php  
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo '
    <div class="container my-2">

        <h2>Start a Discussion</h2>
        <hr>
        <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
            placeholder="Enter the problem title">
        <small id="emailHelp" class="form-text text-muted">Keep problem title as short and crisp as
            possible!</small>
    </div>
    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'" >  
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Problem Description</label>
        <textarea class="form-control" id="desc" name="desc" placeholder="Ellaborate your problem here..."
            rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Post</button>
    </form>
    </div>';
    }
    else{
        echo '<div class="container">
            <h2>Start a Discussion</h2>
            <hr>
            <p class="lead">You are not logged in. Please login to be able to start a discussion.</p>
            </div>';
        }
    ?>

    
    <div class="container" id="ques">
        <h3>Browse Questions</h3>
        <hr>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn , $sql );
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $thdesc = $row['thread_desc'];
            $thread_user_id =$row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users123` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn , $sql2);
            $row2 = mysqli_fetch_assoc($result2);
        

        echo '<div class="media">
        <img src="assets/user_default.jpg" width="34px" class="align-self-start mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a class = "text-dark" href = "/iForum/thread.php?threadid='.$id.'">'.$title.'</a></h5>
                <p style="font-size:13px">'.$thdesc.'</p>
            </div><p class = "font-weight-bold my-0">Asked by:'.$row2['user_email'].' </p>
        </div>';
        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No questions have been posted yet</p>
              <p class="lead">Be the first person to post a question.</p>
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