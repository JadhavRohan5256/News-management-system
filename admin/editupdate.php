<?php
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $email = $_POST['email1'];
    $password = $_POST['password1'];
    $userRole = $_POST['userRole'];
    include 'conn.php';
    $sql = "UPDATE user SET first_name = '$firstName',last_name = '$lastName',user_name = '$userName',email = '$email',password = '$password', user_role = '$userRole' where user_id = '$id'";
    $result = mysqli_query($conn,$sql) or die('Connection Error');
    mysqli_close($conn);
    header('location:'.$hosting.'/admin_home.php');
?>