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
    #maincontainer {
        min-height: 648px;
    }
    </style>
</head>

<?php include "partials/_dbconnect.php";?>
<?php include "partials/_navbar.php";?>

<div class="container my-3" id ="maincontainer">
    <h1>Search results for <em>"<?php echo $_GET['search_query']?>"</em></h1>
    <?php
    $noResult = true;
    $query = $_GET["search_query"];
    $sql = "SELECT * FROM `threads` WHERE match (thread_title , thread_desc) against ('$query')";
    $result = mysqli_query($conn ,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $thdesc = $row['thread_desc'];
        $url = "/iForum/thread.php?threadid=".$id;
        
    echo'<div class="result">
        <h3><a href="'.$url.'" class="text-dark">'.$title.'</a> </h3>
        <p>'.$thdesc.'</p>
    </div>';
    }
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No results found.</p>
          <p class="lead">Suggestions:
          <ul>
          <li>Make sure that all words are spelled correctly.</li>
          <li>Try different keywords.</li>
          <li>Try more general keywords.</li>
          </ul>
          </p>
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