<?php
 require 'config/database.php';


if(isset($_POST['submit'])){
    $FirstName = filter_var($_POST['FirstName'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $LastName = filter_var($_POST['LastName'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ConfirmPassword = filter_var($_POST['ConfirmPassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $IdentityNumber = filter_var($_POST['IdentityNumber'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $PhoneNumber = filter_var($_POST['PhoneNumber'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    
 if(!$FirstName){
    $_SESSION['SignUp'] = "Please enter the FirstName";
 }
    elseif(!$LastName){
    $_SESSION['SignUp'] = "Please enter the LastName";
    }
    elseif(!$email){
    $_SESSION['SignUp'] = "Please enter an email adress";
    }
    elseif(strlen($password)<4 || strlen($ConfirmPassword)<4){
    $_SESSION['SignUp'] = "Password should be atleast 4 characters";
    }
    elseif(!$IdentityNumber){
    $_SESSION['SignUp'] = "Please enter the ID Number";
    }
    elseif(!$PhoneNumber){
    $_SESSION['SignUp'] = "Please enter a PhoneNumber";
    }
    else{
        if($password !== $ConfirmPassword){
            $_SESSION['SignUp'] = "Password do not match";
        }else{
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            
            $user_check_query = "SELECT * FROM users WHERE 
            email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['SignUp'] = "Email is already taken";
            }
        }
    }
 // redirect back to signup page if any problem
    if(isset($_SESSION["SignUp"])){
        // pass back to signup page
        $_SESSION['SignUp-data']= $_POST;
        header('location: '.ROOT_URL.'SignUp.php');
        die();
    }else{
        $insert_user_query = "INSERT INTO users SET FirstName='$FirstName',LastName='$LastName',email='$email',password='$hashed_password',IdentityNumber='$IdentityNumber'
        ,PhoneNumber='$PhoneNumber',is_admin=0";
        $insert_user_results = mysqli_query($connection, $insert_user_query);
        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "Registration is successful Please Log In !";
            header('location:'. ROOT_URL . 'SignIn.php');
            die();
        }
    }
}else{
    header('location:'.ROOT_URL.'SignUp.php');
    die();
}