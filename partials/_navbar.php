 <?php 
 session_start();
 
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/iForum/index.php">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/iForum/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/iForum/about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/iForum/contactus.php">Contact Us</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                       Top Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                $sql = "SELECT * FROM `categories` LIMIT 3";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['categories_id'].'">'.$row['categories'].'</a></li>';
                }       
                echo ' </ul>
                       </li>
                       </ul>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo '<form class="d-flex" method="get" action="search.php">
                <input class="form-control me-2" name="search_query"  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
                </form>
                <p class="text-light mb-0 mx-2">Welcome '.$_SESSION['useremail'].'</p>
                <a role="button" href="partials/_logout.php" class="btn btn-outline-success mx-2" data-bs-toggle="modal">Logout</a>';
            }
            
            else{
                echo '<form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-success" type="submit">Search</button>
                      </form>
                      <div class="mx-2">
                      <button class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                      <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
                      </div>';
                }
        echo'</div>
             </div>
             </nav>';
include "partials/_loginmodal.php";
include "partials/_signupmodal.php";
if(isset($_GET['error'])){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error! </strong>'.$_GET['error'].' 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

else{

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You account has been created. You can now login. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    
}
?>