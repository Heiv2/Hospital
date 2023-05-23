<?php
require 'config/database.php';


if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if (!$email) {
        $_SESSION['SignIn'] = "Email required ";
    } elseif (!$password) {
        $_SESSION['SignIn'] = "Password required ";
    } elseif (!isset($_POST['check'])) {
        $_SESSION['SignIn'] = "Please Check the Checkbox ";
    } else {
        $fetch_user_query = "SELECT * FROM users WHERE email = '$email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);
        if (mysqli_num_rows($fetch_user_result) == 1) {
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            if (password_verify($password, $db_password)) {
                $_SESSION['user-id'] = $user_record['id'];
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                    header('location:' . ROOT_URL . 'admin/');
                } elseif ($user_record['is_admin'] == 0) {
                    $_SESSION['user_is_admin'] = false;
                    header('location:' . ROOT_URL);
                }
            } else {
                $_SESSION['SignIn'] = "Please check your input";
            }
        } else {
            $_SESSION['SignIn'] = "USER NOT FOUND";
        }
    }
    if (isset($_SESSION['SignIn'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location:' . ROOT_URL . 'SignIn.php');
    }
} else {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
