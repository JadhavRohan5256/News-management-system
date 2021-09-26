<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="css/add_category.css">
</head>
<body>
<div class="container">
        <div>
            
            <h1>Forgate Our Password</h1>
        </div>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div>
        <label for="userName">User Name</label>
        <input type="text" name="userName" id="userName" placeholder="User Name">
    </div>
    <div>
        <label for="email">E-Mail</label>
        <input type="email" name="email" id="email" placeholder="E-Mail">
    </div>
    <div>
    <input type="submit" value="Forgate" id="btn" name="forgate">
    </div>
    </form>
    <?php
        if(isset($_POST['btn'])){
            include 'conn.php';
            $userName = mysqli_real_escape_string($conn,$_POST['userName']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $sql = "select *From user where user_name ='{$userName}' && email = '{$email}'";
            $result = mysqli_query($conn,$sql) or die("Query Error");
            if(mysqli_num_rows($result) > 0){
                header('location:'.$hosting.'/forgateUpdate.php');
            }else{
                echo  '<p class="warning"> UserName and email Not matching please try again';
            }
        }
    ?>
</div>
</body>
</html>