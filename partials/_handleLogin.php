<?php
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include ('_dbconnect.php');
    $user_email = $_POST['emailLogin'];
    $user_password = $_POST['passwordLogin'];

    $sql = "SELECT * FROM `users123` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn , $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($user_password , $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] =$row['sno'];
            $_SESSION['useremail'] = $user_email;
            echo "Loggedin".$user_email;          
        }
        header("Location: /index.php");
    }
    header("Location: /iForum/index.php");
    
}
?>