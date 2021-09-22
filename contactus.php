<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Contact us</title>
    <style>
    #ques {
        min-height: 630px;
    }
    </style>
</head>

<body>
    <?php include "partials/_dbconnect.php";?>
    <?php include "partials/_navbar.php";?>

    <?php
    $showAlert = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $uname = $_POST['uname'];
        $uname = str_replace("<","&lt;", $uname);
        $uname = str_replace(">","&gt;", $uname); 
        $email = $_POST['email'];
        $email = str_replace("<","&lt;", $email); 
        $email = str_replace(">","&gt;", $email); 
        $desc = $_POST['desc'];
        $desc = str_replace("<","&lt;", $desc); 
        $desc = str_replace(">","&gt;", $desc); 
        
        $sql = "INSERT INTO `contact` ( `uname`, `email`, `concern_desc`, `time`) VALUES ('$uname', '$email', '$desc', current_timestamp());";
        $result = mysqli_query($conn , $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> We have recieved your issue. We will get back to you.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
    }
    ?>

    <div class="container my-4" id="ques">
        <h1 class="text-center">Contact us</h1>
        <form action="contactus.php" method = "post">
            <div class="form-group my-3">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your usename here..."id="uname" name = "uname">
            </div>
            
            <div class="form-group my-3">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email here..." name= "email">
            </div>
            
            <div class="form-group my-3">
                <label for="exampleFormControlTextarea1">Describe your concern</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" id="desc" name="desc" placeholder="Enter your concern description here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

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