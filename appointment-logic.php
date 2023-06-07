<?php
require 'config/database.php';
    
if (isset($_POST['submit'])) {
    $appid =  rand(10000,99999);
    
    $firstn = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastn = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city = filter_var($_POST['cityname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $docn = filter_var($_POST['docname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = date('Y-m-d',strtotime($_POST['date']));

    if(!$firstn){
        $_SESSION['appointment'] = "Please enter the FirstName";
    }
    elseif(!$lastn){
        $_SESSION['appointment'] = "Please enter the LastName";
    }
    elseif(!$city){
        $_SESSION['appointment'] = "Please enter the City";
    }
    elseif(!$docn){
        $_SESSION['appointment'] = "Please select a doctor";
    }
    elseif(!$date){
        $_SESSION['appointment'] = "Please select a date";
    }
    else{
            $app_check_query = "SELECT * FROM appointments WHERE 
            FirstName='$firstn'and LastName='$lastn'" ;
            $app_check_result = mysqli_query($connection, $app_check_query);
            if(mysqli_num_rows($app_check_result) > 0){
                $_SESSION['appointment'] = "You already have an appointment";
            }
    }
    if(isset($_SESSION["appointment"])){
        // pass back to appointment page
        $_SESSION['appointment-data']= $_POST;
        header('location: '.ROOT_URL.'makeappointment.php');
        die();
    }else{
        $current_user_id = $_SESSION['user-id'];
        $insert_app_query = "INSERT INTO appointments SET app_id = '$appid',FirstName='$firstn'
        ,LastName='$lastn',city='$city',docname = '$docn',date='$date', user_id = '$current_user_id'";
            $insert_app_results = mysqli_query($connection, $insert_app_query);
        if(!mysqli_errno($connection)){
            $_SESSION['appointment-success'] = "You have successfully got an appointment !";
            header('location:'. ROOT_URL . 'index.php');
            die();
        }
    }
}else{
    header('location:'.ROOT_URL.'makeappointment.php');
    die();
}