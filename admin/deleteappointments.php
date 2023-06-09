<?php 
require './config/database.php';
 
if (!isset($_SESSION['user-id'])) {
  header('location:' . ROOT_URL . 'SignIn.php');
  die();
}

if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] === false) {
  header('location:' . ROOT_URL);
  die();
}

if(isset($_GET['id'])){
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  $query = "SELECT * FROM appointments WHERE app_id=$id";
    
  $result = mysqli_query($connection,$query);
  $appoint = mysqli_fetch_assoc($result);
  if($appoint){
    $delete_appointment_query = "DELETE FROM appointments WHERE app_id=$id";
    
    $delete_user_result = mysqli_query($connection,$delete_appointment_query);
    if(mysqli_errno($connection)){
      echo mysqli_error($connection);
      $_SESSION['delete-user'] = "Couldn't delete the appointment";
    }else{
      $_SESSION['delete-user-success'] = "'{$appoint['FirstName']}' deleted successfully";
    }
  }else{
    $_SESSION['delete-user'] = "Appointment not found";
  }
    
}

header('location:' . ROOT_URL . 'admin/index.php');
die();
