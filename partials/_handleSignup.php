<?php
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "_dbconnect.php";
    $user_email = $_POST['signupEmail'];
    $user_password = $_POST['signuppassword'];
    $user_cpassword = $_POST['signupcpassword'];

    //Check whether username already exists
    $sql = "SELECT * FROM `users123` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn , $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = "Email alerady in use.";
    }
    else{
        if(($user_password == $user_cpassword) && strlen($user_password) !=0){
            $hash  = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users123` ( `user_email`, `user_pass`, `time`) VALUES ( '$user_email', '$hash', current_timestamp());";
            $result = mysqli_query($conn , $sql);
            if($result){
                $showAlert = true;
                header("Location: /iForum/index.php?signupsuccess=true");
                exit();
            }
        }
        elseif(strlen($user_password == 0)){
            $showError = "Password field can't be empty";
        }
        else{
            $showError = "Passwords do not match.";
        }
    }
    header("Location:/iForum/index.php?signupsuccess=false&error=$showError");


}


?>