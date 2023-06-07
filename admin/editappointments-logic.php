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
if (isset($_POST['submit'])) {
    $app_id = $_POST['app_id'];
    $firstn = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastn = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city = filter_var($_POST['cityname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $docn = filter_var($_POST['docname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = date('Y-m-d',strtotime($_POST['date']));

    $update_query = "UPDATE appointments SET FirstName='$firstn', LastName='$lastn', city='$city', docname='$docn', date='$date' WHERE app_id = $app_id";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        $_SESSION['update-success'] = "The appointment has been updated successfully!";
        header('location:' . ROOT_URL . 'admin/manageappointments.php');
        exit();
    } else {
        $_SESSION['update-error'] = "Failed to update the appointment. Error: " . mysqli_error($connection);
        header('location:' . ROOT_URL . 'admin/manageappointments.php');
        exit();
    }
    
    header('location:' . ROOT_URL . 'admin/manageappointments.php');
    exit();
} else {
    header('location:' . ROOT_URL . 'admin/manageappointments.php');
    die();
}