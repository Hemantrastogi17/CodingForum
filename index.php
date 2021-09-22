<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>iForum</title>
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6045bd74385de407571d9c82/1f086o4i1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<body>
<?php include "partials/_dbconnect.php";?>
<?php include "partials/_navbar.php";?>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $showAlert =  false;
    $cat_title= $_POST['cat_title'];
    $cat_title = str_replace("<","&lt;", $cat_title); 
    $cat_title = str_replace(">","&gt;", $cat_title); 

    $cat_desc= $_POST['cat_desc'];
    $cat_desc = str_replace("<","&lt;", $cat_desc); 
    $cat_desc = str_replace(">","&gt;", $cat_desc); 

    $sql = "INSERT INTO `add_cat_request` ( `cat_title`, `cat_desc`, `add_cat_time`) VALUES ( '$cat_title', '$cat_desc', current_timestamp());";
    $result = mysqli_query($conn , $sql);
    $showAlert =  true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> Your request has been submitted successfully. We will process your request as soon as possible. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
}
?>

<!-- Silder starts here -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/c-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/c-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/c-3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<!-- Categories container starts here -->
<div class="container my-3" id="ques">
    <h2 class="text-center my-3">iForum - Browse Categories</h2>

    <div class="row">

        <?php
        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($conn , $sql );
        while($row = mysqli_fetch_assoc($result)){
            $cat  = $row['categories'];
            $desc = $row['categories_desc'];
            $id = $row['categories_id'];
            echo '<div class="col-md-4">
            <div class="card my-2" style="width: 18rem;">
                <img src="assets/card-'.$id.'.jpg" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href ="threadlist.php?catid='.$id.' ">'.$cat.'</a></h5>
                    <p class="card-text">'.substr($desc, 0 ,90).'...</p>
                    <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>';
        }
        
        
        ?>
    </div>
</div>

<!-- Add a Category form -->



<div class="container text-center">
    <div class="jumbotron jumbotron-fluid">
        <div class="container my-4 " id="color">
            <h1 class="display-4">Want to add more Categories to iForum?</h1>
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Let us know!
                </a>

            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="container bg-light tex-dark">
                        <form action="/index.php" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Title</label>
                                <input type="text" class="form-control" id="cat_title" name="cat_title"
                                    placeholder="Enter the category title that you want to be added here..."
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                                <textarea class="form-control" id="cat_desc" name="cat_desc"
                                    placeholder="Enter the category description here..."
                                    id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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